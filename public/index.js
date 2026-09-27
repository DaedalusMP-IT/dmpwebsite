/* ==========================================================================
   Daedalus — единый обработчик заявок.
   Любая форма с атрибутом data-tg-form отправляется на /api/submit
   и попадает в Telegram. Пример:

     <form data-tg-form data-service="Проектирование" data-source="Проектирование">
         <input type="text" name="name" required>
         <input type="tel"  name="phone" required>
         <button type="submit">Отправить</button>
     </form>
   ========================================================================== */
(function () {
    'use strict';

    function validatePhone(phone) {
        return /^[\d\s\+\-\(\)]{7,20}$/.test(String(phone || '').trim());
    }

    /* ----------------------------- модалка «Спасибо» ---------------------- */

    function ensureModal() {
        var modal = document.getElementById('thankYouModal');
        if (modal) return modal;

        modal = document.createElement('div');
        modal.id = 'thankYouModal';
        modal.className = 'hidden';
        modal.style.cssText = 'display:none;position:fixed;inset:0;background:rgba(0,0,0,.6);' +
            'z-index:99999;align-items:center;justify-content:center;padding:20px;';
        modal.innerHTML =
            '<div style="background:#fff;color:#10022B;border-radius:12px;padding:32px;' +
            'max-width:420px;width:100%;text-align:center;font-family:inherit;">' +
            '<h2 style="margin:0 0 12px;font-size:24px;font-weight:700;">Спасибо!</h2>' +
            '<p style="margin:0 0 24px;font-size:15px;line-height:1.5;">' +
            'Заявка отправлена. Мы свяжемся с вами в ближайшее время.</p>' +
            '<button type="button" data-close-modal style="background:#9333ea;color:#fff;border:0;' +
            'padding:10px 28px;border-radius:8px;font-size:15px;cursor:pointer;">OK</button>' +
            '</div>';
        document.body.appendChild(modal);
        return modal;
    }

    function showModal() {
        var modal = ensureModal();
        modal.classList.remove('hidden');
        modal.style.display = 'flex';
    }

    function closeModal() {
        var modal = document.getElementById('thankYouModal');
        if (!modal) return;
        modal.classList.add('hidden');
        modal.style.display = 'none';
    }

    /* ------------------------------- отправка ----------------------------- */

    function meta(name) {
        var el = document.querySelector('meta[name="' + name + '"]');
        return el ? (el.getAttribute('content') || '').trim() : '';
    }

    // Адрес приёма заявок, в порядке приоритета:
    //   1. window.FORM_ENDPOINT — задаётся в form-config.js рядом со статикой;
    //      его можно править прямо на хостинге, не пересобирая сайт;
    //   2. <meta name="form-endpoint"> — подставляется Laravel из FORM_ENDPOINT;
    //   3. этот же сайт — когда приём заявок живёт вместе с фронтендом.
    function endpoint() {
        var configured = typeof window.FORM_ENDPOINT === 'string' ? window.FORM_ENDPOINT.trim() : '';

        return configured || meta('form-endpoint') || '/api/submit';
    }

    function isCrossOrigin(url) {
        return /^https?:\/\//i.test(url) && url.indexOf(window.location.origin) !== 0;
    }

    function send(payload) {
        var url = endpoint();
        var headers = {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        };

        // CSRF-токен имеет смысл только для запроса на свой же домен;
        // на чужом домене он лишний и провоцирует preflight-ошибки.
        if (!isCrossOrigin(url)) {
            headers['X-Requested-With'] = 'XMLHttpRequest';
            headers['X-CSRF-TOKEN'] = meta('csrf-token');
        }

        return fetch(url, {
            method: 'POST',
            mode: 'cors',
            headers: headers,
            body: JSON.stringify(payload)
        }).then(function (response) {
            return response.json()
                .catch(function () { return { success: false }; })
                .then(function (data) {
                    if (response.ok && data.success) return data;
                    throw new Error(data.message || 'Не удалось отправить заявку. Попробуйте ещё раз.');
                });
        });
    }

    /* --------------------------- привязка к формам ------------------------ */

    function fieldValue(form, names) {
        for (var i = 0; i < names.length; i++) {
            var el = form.querySelector('[name="' + names[i] + '"]');
            if (el && el.value.trim()) return el.value.trim();
        }
        return '';
    }

    function handleSubmit(event) {
        event.preventDefault();

        var form = event.currentTarget;
        if (form.dataset.sending === '1') return;

        var name = fieldValue(form, ['name']);
        var phone = fieldValue(form, ['phone', 'number', 'tel']);

        if (!name) { alert('Введите имя'); return; }
        if (!validatePhone(phone)) { alert('Введите корректный номер телефона'); return; }

        var source = form.dataset.source
            || fieldValue(form, ['source'])
            || (document.getElementById('source') || {}).value
            || document.title
            || 'Сайт';

        var payload = {
            name: name,
            phone: phone,
            service: form.dataset.service || fieldValue(form, ['service']) || source,
            source: source,
            comment: fieldValue(form, ['comment', 'message'])
        };

        var button = form.querySelector('[type="submit"], button');
        var buttonText = button ? button.innerHTML : '';

        form.dataset.sending = '1';
        if (button) { button.disabled = true; button.innerHTML = 'Отправляем…'; }

        send(payload)
            .then(function () {
                form.reset();
                showModal();
            })
            .catch(function (error) {
                alert(error.message || 'Не удалось отправить заявку. Попробуйте ещё раз.');
            })
            .then(function () {
                form.dataset.sending = '0';
                if (button) { button.disabled = false; button.innerHTML = buttonText; }
            });
    }

    function initForms(root) {
        var forms = (root || document).querySelectorAll('[data-tg-form]');
        Array.prototype.forEach.call(forms, function (form) {
            if (form.dataset.tgBound === '1') return;
            form.dataset.tgBound = '1';
            form.setAttribute('novalidate', 'novalidate');
            form.addEventListener('submit', handleSubmit);
        });
    }

    function init() {
        initForms(document);

        document.addEventListener('click', function (event) {
            var modal = document.getElementById('thankYouModal');
            if (!modal) return;
            if (event.target === modal || event.target.closest('[data-close-modal]')) closeModal();
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') closeModal();
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    /* ---------------------- обратная совместимость ------------------------ */

    // Старая разметка: <button type="button" onclick="submitFeedback()">
    window.submitFeedback = function () {
        var form = document.getElementById('contactForm') || document.querySelector('[data-tg-form]');
        if (!form) return;
        if (typeof form.requestSubmit === 'function') form.requestSubmit();
        else handleSubmit({ preventDefault: function () {}, currentTarget: form });
    };

    window.closeModal = closeModal;
    window.validatePhone = validatePhone;
    window.DaedalusForms = { init: initForms, send: send, showModal: showModal, closeModal: closeModal };

    window.scrollDown = window.scrollDown || function () {
        var target = document.getElementById('target');
        if (target) target.scrollIntoView({ behavior: 'smooth' });
    };
})();
