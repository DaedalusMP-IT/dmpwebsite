function validatePhone(phone) {
    return /^[\d\s\+\-\(\)]{7,16}$/.test(phone.trim());
}

function submitFeedback() {
    const nameEl   = document.getElementById('input');
    const phoneEl  = document.getElementById('input1');
    const sourceEl = document.getElementById('source');

    const name   = nameEl ? nameEl.value.trim() : '';
    const phone  = phoneEl ? phoneEl.value.trim() : '';
    const source = sourceEl ? sourceEl.value : 'Сайт';

    if (!name) { alert('Введите имя'); return; }
    if (!validatePhone(phone)) { alert('Введите корректный номер телефона'); return; }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/api/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ name, phone, service: source, source })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const modal = document.getElementById('thankYouModal');
            if (modal) { modal.classList.remove('hidden'); modal.style.display = 'flex'; }
            if (nameEl) nameEl.value = '';
            if (phoneEl) phoneEl.value = '';
        } else {
            alert('Ошибка: ' + (data.message || 'Попробуйте ещё раз'));
        }
    })
    .catch(() => alert('Ошибка отправки. Попробуйте ещё раз.'));
}

function closeModal() {
    const modal = document.getElementById('thankYouModal');
    if (modal) { modal.classList.add('hidden'); modal.style.display = 'none'; }
}

window.onclick = function(event) {
    const modal = document.getElementById('thankYouModal');
    if (modal && event.target === modal) closeModal();
};

function scrollDown() {
    const target = document.getElementById('target');
    if (target) target.scrollIntoView({ behavior: 'smooth' });
}
