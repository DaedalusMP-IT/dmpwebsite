<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BIM Внедрение - DAEDALUS</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body style="background: #10022B; margin: 0; padding: 0; font-family: 'Involve', sans-serif; position: relative; overflow-x: hidden; width: 100%;">

<style>

    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-Regular.woff2') format('woff2');
        font-weight: 400;
        font-style: normal;
    }

    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-SemiBold.woff2') format('woff2');
        font-weight: 600;
        font-style: normal;
    }

    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-Bold.woff2') format('woff2');
        font-weight: 700;
        font-style: normal;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html, body {
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        width: 100%;
        max-width: 100vw;
    }

    /* Header z-index fix */
    header {
        position: relative;
        z-index: 9999 !important;
    }

    #mobile-menu {
        z-index: 9998 !important;
    }

    /* Page Container */
    .page-container {
        width: 100%;
        margin: 0 auto;
        position: relative;
        background: #10022B;
    }

    .content-wrapper {
        width: 1150px;
        margin: 0 auto;
        position: relative;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        max-height: 800px;
        display: flex;
        align-items: flex-end;
        background: #10022B;
    }

    .hero-fade-bottom {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30%;
        background: linear-gradient(to bottom, transparent 0%, rgba(16,2,43,0.6) 40%, #10022B 65%, #10022B 100%);
        z-index: 1;
        pointer-events: none;
    }

    .hero-background {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/public/hero_bim.jpg') center/cover;
    }

    .hero-overlay {
        display: none;
    }

    .hero-content {
        position: relative;
        padding-top: 0;
        padding-bottom: 130px;
        width: 1150px;
        margin: 0 auto;
        z-index: 10;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .hero-title {
        font-weight: 600;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        margin-bottom: 10px;
    }

    .hero-description {
        max-width: 650px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 20px;
        text-align: center;
    }

    .hero-button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 22px 65px;
        background: #810EC7;
        border-radius: 12px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        text-decoration: none;
        cursor: pointer;
    }

    /* Services Section */
    .services-section {
        margin-bottom: 100px;
    }

    .section-title {
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        color: #F8F3FC;
        margin-bottom: 60px;
        max-width: 962px;
        width: 100%;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        width: 1150px;
    }

    .service-card {
        position: relative;
        height: 370px;
        border-radius: 20px;
        padding: 50px 50px;
        display: flex;
        flex-direction: column;
        gap: 20px;
        backdrop-filter: blur(101.28px);
        overflow: hidden;
        transition: all 0.4s ease;
        box-sizing: border-box;
    }

    .service-card:hover {
        height: 520px;
    }

    .service-card:nth-child(1) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_1.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(2) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_2.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(3) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_3.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(4) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_4.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(5) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_5.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(6) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/bim_service_6.jpg') center/cover no-repeat;
    }

    .service-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
        flex: 1;
    }

    .service-title {
        font-weight: 700;
        font-size: 18px;
        line-height: 24px;
        color: #F8F3FC;
        flex-shrink: 0;
    }

    .service-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        max-height: 0;
        opacity: 0;
        overflow: hidden;
        transition: all 0.4s ease;
    }

    .service-card:hover .service-description {
        max-height: 300px;
        opacity: 1;
    }

    .service-arrow {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: rgba(248, 243, 252, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        flex-shrink: 0;
        margin-top: auto;
    }

    .service-arrow::after {
        content: '→';
        font-size: 24px;
        color: #F8F3FC;
    }

    /* Application Form Section */
    .application-section {
        display: flex;
        gap: 115px;
        width: 1085px;
        margin: 0 auto 100px;
    }

    .form-container {
        width: 457px;
    }

    .form-title {
        font-weight: 600;
        font-size: 36px;
        line-height: 44px;
        color: #F8F3FC;
        margin-bottom: 2px;
        white-space: nowrap;
    }

    .form-subtitle {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 50px;
    }

    .form-input {
        width: 435px;
        height: 70px;
        padding: 20px 30px;
        background: rgba(248, 243, 252, 0.1);
        border: 1px solid rgba(248, 243, 252, 0.2);
        backdrop-filter: blur(101.28px);
        border-radius: 12px;
        font-family: 'Involve';
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 20px;
        outline: none;
    }

    .custom-select { position: relative; width: 100%; margin-bottom: 20px; }
    .custom-select-trigger { width: 100%; height: 70px; background: rgba(248,243,252,0.1); border: 1px solid rgba(248,243,252,0.2); border-radius: 12px; padding: 0 25px; font-family: 'Involve', sans-serif; font-size: 16px; color: rgba(248,243,252,0.7); cursor: pointer; display: flex; align-items: center; justify-content: space-between; box-sizing: border-box; user-select: none; }
    .custom-select-trigger.selected { color: #F8F3FC; }
    .custom-select-trigger svg { flex-shrink: 0; transition: transform 0.2s; }
    .custom-select.open .custom-select-trigger svg { transform: rotate(180deg); }
    .custom-select-dropdown { display: none; position: absolute; top: calc(100% + 4px); left: 0; right: 0; background: #1a0445; border: 1px solid rgba(248,243,252,0.2); border-radius: 12px; overflow: hidden; z-index: 99999; box-shadow: 0 8px 32px rgba(0,0,0,0.5); }
    .custom-select.open .custom-select-dropdown { display: block; }
    .custom-select-option { padding: 14px 25px; font-family: 'Involve', sans-serif; font-size: 16px; color: #F8F3FC; cursor: pointer; transition: background 0.15s; }
    .custom-select-option:hover { background: rgba(124,58,237,0.3); }
    .custom-select-option.active { background: rgba(124,58,237,0.2); color: #c084fc; }
    .application-section { overflow: visible !important; }

    select.form-input option {
        background: #10022B;
        color: #F8F3FC;
    }

    .form-input::placeholder {
        color: #F8F3FC;
        opacity: 0.6;
    }

    .form-button {
        width: 435px;
        height: 65px;
        background: #810EC7;
        border-radius: 12px;
        border: none;
        font-family: 'Involve';
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        cursor: pointer;
        transition: background 0.3s;
        display: block;
        margin-top: 10px;
    }

    .form-button:hover {
        background: #6B0BA8;
    }

    .form-image {
        width: 439px;
        height: 439px;
        border-radius: 20px;
        background: url('/public/form_logo.png') center/250px no-repeat;
    }


    /* Responsive */
    @media (max-width: 1400px) {
        .page-container,
        .hero-section {
            width: 100%;
        }

        .content-wrapper {
            width: 100%;
            padding: 0 20px;
        }

        .services-grid {
            width: 100%;
            grid-template-columns: repeat(2, 1fr);
        }

        .service-card {
            width: 100%;
        }

        .application-section {
            width: 100%;
            padding: 0 20px;
        }
    }

    @media (max-width: 768px) {

        .hero-section {
            height: 70vh;
            min-height: 70vh;
            display: flex;
            align-items: flex-end;
        }

        .hero-fade-bottom {
            height: 55%;
        }

        .hero-content {
            padding: 0 20px 60px;
            width: 100%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero-title {
            width: 100%;
            font-size: 28px;
            line-height: 36px;
            margin-bottom: 20px;
        }

        .hero-description {
            width: 100%;
            max-width: 320px;
            font-size: 13px;
            line-height: 20px;
            margin-bottom: 25px;
            text-align: center;
        }

        .hero-button {
            width: 100%;
            max-width: 335px;
            font-size: 14px;
            padding: 16px 32px;
            margin: 0 auto;
        }

        .content-wrapper {
            padding: 0 20px;
            width: 100%;
        }

        .section-title {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 30px;
            text-align: center;
            width: 100%;
        }

        .services-grid {
            grid-template-columns: 1fr;
            gap: 20px;
            width: 100%;
        }

        .service-card {
            padding: 24px;
            height: 200px;
        }

        .service-card:hover {
            height: 350px;
        }

        .service-title {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 12px;
        }

        .service-description {
            font-size: 13px;
            line-height: 20px;
        }

        .application-section {
            flex-direction: column;
            gap: 30px;
            padding: 60px 20px;
            width: 100%;
            margin-top: 60px;
            margin-bottom: 60px;
            position: relative;
            overflow: visible;
        }


        @keyframes pulse {
            0%, 100% {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0.5;
            }
            50% {
                transform: translate(-50%, -50%) scale(1.2);
                opacity: 0.7;
            }
        }

        .form-image {
            display: none;
        }

        .form-container {
            width: 100%;
            position: relative;
            z-index: 1;
        }

        .form-container h2 {
            font-size: 28px;
            line-height: 36px;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .form-container p {
            text-align: center;
            font-size: 13px;
            line-height: 18px;
            margin-bottom: 30px;
        }

        .form-input {
            width: 100%;
            font-size: 16px;
            height: 60px;
        }

        .submit-button,
        .form-button {
            width: 100%;
            font-size: 14px;
            padding: 16px 32px;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 28px;
            line-height: 36px;
        }

        .section-title {
            font-size: 22px;
            line-height: 28px;
        }

        .form-container h2 {
            font-size: 24px;
            line-height: 32px;
        }

        .service-card {
            padding: 20px;
        }

        .hero-button,
        .submit-button,
        .form-button {
            padding: 10px 20px;
            font-size: 12px;
        }

        .form-input {
            width: 100%;
        }
    }
</style>

@include('components.header')

<div class="page-container">
    <!-- Hero Section -->
    <section class="hero-section" style="overflow:hidden;">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ __('messages.automation.title') }}</h1>
            <p class="hero-description">{{ __('messages.automation.hero.description') }}</p>
            <a href="#form" class="hero-button">{{ __('messages.automation.hero.button') }}</a>
        </div>
        <!-- Градиентный блюр внутри hero -->
        <div style="position:absolute;bottom:0;left:0;width:100%;height:250px;z-index:8;background:linear-gradient(to bottom,transparent 0%,rgba(16,2,43,0.7) 55%,#10022B 100%);pointer-events:none;"></div>
    </section>
    <!-- Сплошная полоска перекрывает sub-pixel зазор -->
    <div style="position:relative;z-index:20;margin-top:-3px;height:4px;background:#10022B;pointer-events:none;"></div>

    <!-- Services Section -->
    <section class="content-wrapper services-section" style="padding-top: 100px;">
        <h2 class="section-title">{{ __('messages.automation.services.title') }}</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">{{ __('messages.automation.service_1.title') }}</h3>
                    <p class="service-description">{{ __('messages.automation.service_1.desc') }}</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">{{ __('messages.automation.service_2.title') }}</h3>
                    <p class="service-description">{{ __('messages.automation.service_2.desc') }}</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">{{ __('messages.automation.service_3.title') }}</h3>
                    <p class="service-description">{{ __('messages.automation.service_3.desc') }}</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">{{ __('messages.automation.service_4.title') }}</h3>
                    <p class="service-description">{{ __('messages.automation.service_4.desc') }}</p>
                </div>
                <div class="service-arrow"></div>
            </div>

        </div>
    </section>

    <!-- Application Form Section -->
    <section class="application-section" id="form">
        <div class="form-container">
            <h2 class="form-title">{{ __('messages.form.title') }}</h2>
            <p class="form-subtitle">{{ __('messages.form.subtitle') }}</p>
            <form id="automationForm">
                <input type="hidden" name="source" value="BIM Внедрение">
                <input type="hidden" name="service" value="BIM Внедрение">
                <input type="text" name="name" class="form-input" placeholder="{{ __('messages.form.name') }}" required>
                <input type="tel" name="phone" class="form-input" placeholder="{{ __('messages.form.phone') }}" required>
                <button type="submit" class="form-button">{{ __('messages.form.submit') }}</button>
            </form>
        </div>
        <div class="form-image"></div>
    </section>
</div>

@include('components.footer')

<script>
// Mobile menu toggle
const mobileMenuButton = document.getElementById('mobile-menu-button');
const mobileMenu = document.getElementById('mobile-menu');

if (mobileMenuButton && mobileMenu) {
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
}

// Form submission
document.getElementById('automationForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const phone = this.querySelector('[name="phone"]').value.trim();
    if (!/^[\d\s\+\-\(\)]{7,16}$/.test(phone)) { alert('Введите корректный номер телефона'); return; }

    const data = {
        name: this.querySelector('[name="name"]').value.trim(),
        phone,
        service: 'BIM Внедрение',
        source: 'BIM Внедрение'
    };

    fetch('/api/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        },
        body: JSON.stringify(data)
    })
    .then(r => r.json())
    .then(result => {
        if (result.success) {
            const modal = document.getElementById('thankYouModal');
            if (modal) { modal.classList.remove('hidden'); modal.style.display = 'flex'; }
            this.reset();
        } else {
            alert('Ошибка: ' + (result.message || 'Попробуйте ещё раз'));
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Ошибка при отправке заявки');
    });
});

var _dd = null, _dt = null;
function toggleSelect(id) {
    var trigger = document.querySelector('#' + id + ' .custom-select-trigger');
    var dropdown = document.querySelector('#' + id + ' .custom-select-dropdown');
    if (_dd === dropdown) { closeDD(); return; }
    closeDD();
    document.body.appendChild(dropdown);
    var rect = trigger.getBoundingClientRect();
    var spaceBelow = window.innerHeight - rect.bottom;
    var dropH = Math.min(dropdown.scrollHeight || 250, 300);
    dropdown.style.cssText = 'display:block;position:fixed;width:' + rect.width + 'px;left:' + rect.left + 'px;z-index:999999;';
    if (spaceBelow < dropH + 10) {
        dropdown.style.bottom = (window.innerHeight - rect.top + 4) + 'px';
        dropdown.style.top = 'auto';
    } else {
        dropdown.style.top = (rect.bottom + 4) + 'px';
        dropdown.style.bottom = 'auto';
    }
    trigger.querySelector('svg').style.transform = 'rotate(180deg)';
    _dd = dropdown; _dt = trigger;
}
function closeDD() {
    if (_dd) { _dd.style.display = 'none'; if (_dt) _dt.querySelector('svg').style.transform = ''; _dd = null; _dt = null; }
}
function selectOption(selectId, inputId, textId, value, el) {
    document.getElementById(inputId).value = value;
    document.getElementById(textId).textContent = value;
    document.querySelector('#' + selectId + ' .custom-select-trigger').classList.add('selected');
    document.querySelectorAll('#' + selectId + ' .custom-select-option').forEach(function(o){ o.classList.remove('active'); });
    el.classList.add('active');
    closeDD();
}
document.addEventListener('click', function(e) {
    if (_dt && !_dt.contains(e.target) && _dd && !_dd.contains(e.target)) closeDD();
});
</script>

</body>
</html>
