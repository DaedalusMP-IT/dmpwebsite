@extends('layouts.app')

@section('title', __('messages.arvr.title') . ' - DAEDALUS')

@push('styles')
<style>
    body {
        background: #10022B;
        font-family: 'Involve', sans-serif;
        margin: 0;
        padding: 0;
    }


    .arvr-page {
        position: relative;
        width: 100%;
        background: #10022B;
        color: #F8F3FC;
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

    /* Hero Section */
    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        max-height: 800px;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
        background: #10022B;
    }

    .hero-background {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/hero_arvr.jpg') center/cover no-repeat;
    }

    .hero-background::before { display: none; }
    .hero-background::after { display: none; }

    .hero-content {
        position: relative;
        z-index: 10;
        width: 1150px;
        margin: 0 auto;
        padding: 0 20px 60px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .hero-title {
        font-weight: 600;
        font-size: 38px;
        line-height: 50px;
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
        width: 260px;
        height: 65px;
        background: #810EC7;
        border-radius: 12px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        text-decoration: none;
        transition: background 0.3s ease;
        box-sizing: border-box;
    }

    .hero-button:hover {
        background: #9a1ae8;
    }

    /* Main Content Container */
    .page-container {
        width: 1400px;
        margin: 0 auto;
        position: relative;
    }

    .content-wrapper {
        width: 1150px;
        margin: 0 auto;
        padding-left: 0;
        padding-right: 0;
    }

    .section-title {
        width: 718px;
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        color: #F8F3FC;
        margin-bottom: 65px;
        margin-top: 65px;
    }

    /* Services Grid */
    .services-section {
        margin-bottom: 100px;
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
        padding: 40px;
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
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/arvr_service_1.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(2) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/arvr_service_2.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(3) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/arvr_service_3.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(4) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/arvr_service_4.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(5) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/arvr_service_5.jpg') center/cover no-repeat;
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
    .form-title {
        font-weight: 600;
        font-size: 36px;
        line-height: 44px;
        color: #F8F3FC;
        margin-bottom: 10px;
        white-space: nowrap;
    }

    .application-section {
        display: flex;
        width: 1150px;
        margin: 0 auto 100px;
        gap: 115px;
        align-items: flex-start;
    }

    .form-container {
        width: 457px;
    }

    .form-container h2 {
        width: 457px;
        font-weight: 600;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        margin-bottom: 2px;
    }

    .form-container p {
        width: 366px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-input {
        display: flex;
        align-items: center;
        width: 435px;
        height: 70px;
        padding: 20px 30px;
        background: rgba(248, 243, 252, 0.1);
        border: 1px solid rgba(248, 243, 252, 0.2);
        backdrop-filter: blur(101.28px);
        border-radius: 12px;
        font-family: 'Involve', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        outline: none;
        box-sizing: border-box;
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
        opacity: 0.7;
    }

    .submit-button {
        display: block;
        width: 435px;
        height: 65px;
        background: #810EC7;
        border-radius: 12px;
        border: none;
        font-family: 'Involve', sans-serif;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        cursor: pointer;
        transition: background 0.3s ease;
        margin-top: 10px;
    }

    .submit-button:hover {
        background: #9a1ae8;
    }

    .application-image {
        width: 579px;
        height: 275px;
        background: url('/public/form_logo.png') center/250px no-repeat;
    }

    /* Responsive Design */
    @media (max-width: 1400px) {
        .page-container {
            width: 100%;
            padding: 0 20px;
        }

        .content-wrapper,
        .hero-content {
            width: 100%;
            max-width: 1150px;
        }

        .services-grid,
        .application-section {
            width: 100%;
            grid-template-columns: 1fr;
        }

        .service-card {
            width: 100%;
            max-width: 565px;
            margin: 0 auto;
        }

        .hero-title,
        .section-title,
        .form-container h2 {
            width: 100%;
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
            line-height: 18px;
            margin-bottom: 25px;
            text-align: center;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
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

        .application-image {
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
            width: 100%;
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

        .submit-button {
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
        .submit-button {
            padding: 10px 20px;
            font-size: 12px;
        }
    }
</style>
@endpush

@section('content')
<div class="arvr-page">
    <!-- Hero Section -->
    <section class="hero-section" style="overflow:hidden;">
        <div class="hero-background"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ __('messages.arvr.title') }}</h1>
            <p class="hero-description">{{ __('messages.arvr.hero.description') }}</p>
            <a href="#application" class="hero-button">{{ __('messages.arvr.hero.button') }}</a>
        </div>
        <!-- Градиентный блюр внутри hero -->
        <div style="position:absolute;bottom:0;left:0;width:100%;height:250px;z-index:8;background:linear-gradient(to bottom,transparent 0%,rgba(16,2,43,0.7) 55%,#10022B 100%);pointer-events:none;"></div>
    </section>
    <!-- Сплошная полоска перекрывает sub-pixel зазор -->
    <div style="position:relative;z-index:20;margin-top:-3px;height:4px;background:#10022B;pointer-events:none;"></div>

    <div class="page-container">
        <!-- Services Section -->
        <section class="content-wrapper services-section" style="padding-top: 100px;">
            <h2 class="section-title">{{ __('messages.arvr.service_title') }}</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">{{ __('messages.arvr.service_1.title') }}</h3>
                        <p class="service-description">{{ __('messages.arvr.service_1.desc') }}</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">{{ __('messages.arvr.service_2.title') }}</h3>
                        <p class="service-description">{{ __('messages.arvr.service_2.desc') }}</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">{{ __('messages.arvr.service_3.title') }}</h3>
                        <p class="service-description">{{ __('messages.arvr.service_3.desc') }}</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">{{ __('messages.arvr.service_4.title') }}</h3>
                        <p class="service-description">{{ __('messages.arvr.service_4.desc') }}</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>
            </div>
        </section>

        <!-- Application Form Section -->
        <section class="application-section" id="application">
            <div class="form-container">
                <h2 class="form-title">{{ __('messages.form.title') }}</h2>
                <p>{{ __('messages.form.subtitle') }}</p>

                <form id="arvrForm" onsubmit="submitARVRForm(event)">
                    <div class="form-group">
                        <input type="text" name="name" class="form-input" placeholder="{{ __('messages.form.name') }}" required>
                    </div>

                    <div class="form-group">
                        <input type="tel" name="phone" class="form-input" placeholder="{{ __('messages.form.phone') }}" required>
                    </div>

                    <button type="submit" class="submit-button">{{ __('messages.form.submit') }}</button>
                </form>
            </div>

            <div class="application-image"></div>
        </section>
    </div>
</div>

<script>
function submitARVRForm(event) {
    event.preventDefault();
    
    const formData = new FormData(event.target);
    const phone = formData.get('phone').trim();
    if (!/^[\d\s\+\-\(\)]{7,16}$/.test(phone)) { alert('Введите корректный номер телефона'); return; }

    const data = {
        name: formData.get('name').trim(),
        phone,
        service: 'AR/VR обучение',
        source: 'AR/VR обучение'
    };

    fetch('/api/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(data)
    })
    .then(r => r.json())
    .then(result => {
        if (result.success) {
            const modal = document.getElementById('thankYouModal');
            if (modal) { modal.classList.remove('hidden'); modal.style.display = 'flex'; }
            event.target.reset();
        } else {
            alert('Ошибка: ' + (result.message || 'Попробуйте ещё раз'));
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.');
    });
}

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
@endsection
