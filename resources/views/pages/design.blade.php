@extends('layouts.app')

@section('title', __('messages.design.title') . ' - DAEDALUS')

@section('content')
<style>
    .design-page {
        font-family: 'Involve', sans-serif;
        background: #10022B;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
    }
    
    
    /* Hero Section */
    .hero-section {
        position: relative;
        width: 100%;
        height: 728px;
        overflow: hidden;
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
    
    .hero-bg-image {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/hero_design.jpg') center/cover;
    }

    .hero-overlay {
        display: none;
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-bottom: 130px;
    }

    .hero-title {
        font-weight: 600;
        font-size: 38px;
        line-height: 50px;
        color: #F8F3FC;
        margin-bottom: 10px;
    }

    br.mobile-br { display: none; }

    @media (max-width: 768px) {
        br.mobile-br { display: block; }
    }

    .hero-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        max-width: 650px;
        margin-bottom: 40px;
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
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    .hero-button:hover {
        background: #9a1ee8;
    }
    
    .content-wrapper {
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px;
        position: relative;
        z-index: 1;
    }
    
    .section-title {
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        color: #F8F3FC;
        margin-bottom: 50px;
        margin-top: 0;
    }
    
    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 0;
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
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_1.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(2) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_2.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(3) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_3.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(4) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_4.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(5) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_5.jpg') center/cover no-repeat;
    }

    .service-card:nth-child(6) {
        background: linear-gradient(rgba(0,0,0,0.45), rgba(0,0,0,0.45)), url('/public/design_service_6.jpg') center/cover no-repeat;
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
    
    /* Projects Slider */
    .projects-section {
        margin-top: 100px;
    }
    
    .projects-slider {
        display: flex;
        gap: 20px;
        overflow-x: auto;
        padding: 20px 0;
        scroll-behavior: smooth;
    }
    
    .projects-slider::-webkit-scrollbar {
        height: 8px;
    }
    
    .projects-slider::-webkit-scrollbar-track {
        background: rgba(248, 243, 252, 0.1);
        border-radius: 10px;
    }
    
    .projects-slider::-webkit-scrollbar-thumb {
        background: #810EC7;
        border-radius: 10px;
    }
    
    .project-card {
        flex-shrink: 0;
        width: 340px;
        height: 230px;
        border-radius: 20px;
        position: relative;
        overflow: hidden;
    }
    
    .project-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
    }
    
    .project-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(16, 2, 43, 0.5);
        border: 1px solid rgba(248, 243, 252, 0.2);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .project-info {
        text-align: center;
        padding: 20px;
    }
    
    .project-title {
        font-weight: 700;
        font-size: 18px;
        line-height: 24px;
        color: #F8F3FC;
        margin-bottom: 20px;
    }
    
    .project-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
    }
    
    /* Projects button */
    .projects-btn-wrapper {
        margin-top: 50px;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 10px;
    }

    .projects-circle-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        text-decoration: none;
        transition: all 0.3s ease;
        background: rgba(255, 255, 255, 0.05);
    }

    .projects-circle-btn:hover {
        background: #7C3AED;
        border-color: #7C3AED;
        transform: scale(1.1);
    }

    .projects-circle-label {
        font-family: 'Involve', sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: rgba(255, 255, 255, 0.6);
        letter-spacing: 0.05em;
    }

    @media (max-width: 768px) {
        .projects-btn-wrapper {
            align-items: center;
            margin-top: 30px;
        }
    }

    /* Application Form Section */
    .application-section {
        margin-top: 100px;
        margin-bottom: 100px;
        display: flex;
        gap: 100px;
        align-items: center;
    }
    
    .application-form {
        flex: 1;
        max-width: 457px;
    }
    
    .application-title {
        font-weight: 600;
        font-size: 36px;
        line-height: 44px;
        color: #F8F3FC;
        margin-bottom: 10px;
        white-space: nowrap;
    }
    
    .application-text {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 40px;
    }
    
    .form-input-app {
        width: 100%;
        max-width: 435px;
        height: 70px;
        background: rgba(248, 243, 252, 0.1);
        border: 1px solid rgba(248, 243, 252, 0.2);
        backdrop-filter: blur(101.28px);
        border-radius: 12px;
        padding: 0 30px;
        font-family: 'Involve', sans-serif;
        font-size: 16px;
        color: #F8F3FC;
        margin-bottom: 20px;
    }
    
    .form-input-app::placeholder {
        color: #F8F3FC;
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
    .content-wrapper { overflow: visible !important; }
    
    .form-input-app:focus {
        outline: none;
        border-color: rgba(248, 243, 252, 0.4);
    }
    
    .submit-button {
        width: 435px;
        height: 65px;
        background: #810EC7;
        border-radius: 12px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
        display: block;
        margin-top: 10px;
    }
    
    .submit-button:hover {
        background: #9a1ee8;
    }
    
    .application-image {
        width: 498px;
        height: 433px;
        background: url('/public/form_logo.png') center/250px no-repeat;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .services-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .application-section {
            flex-direction: column;
            gap: 40px;
        }
        
        .application-image {
            width: 100%;
            max-width: 498px;
        }
    }
    
    @media (max-width: 768px) {

        .hero-section {
            height: 70vh;
            min-height: 70vh;
            padding: 0;
            display: flex;
            align-items: flex-end;
        }

        .hero-fade-bottom {
            height: 55%;
        }

        .hero-content {
            padding: 0 20px 60px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero-title {
            font-size: 28px;
            line-height: 36px;
            margin-bottom: 20px;
        }

        .hero-description {
            font-size: 13px;
            line-height: 20px;
            margin-bottom: 25px;
            max-width: 320px;
            text-align: center;
        }

        .hero-button {
            width: 100%;
            max-width: 335px;
            font-size: 14px;
            padding: 16px 32px;
        }

        .content-wrapper {
            padding: 40px 20px 60px;
        }
        
        .section-title {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 30px;
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

        .application-form {
            position: relative;
            z-index: 1;
            width: 100%;
            max-width: 100%;
        }

        .form-container {
            width: 100%;
        }

        .application-title {
            font-size: 28px;
            line-height: 36px;
            width: 100%;
            text-align: center;
            margin-bottom: 10px;
        }

        .application-text {
            text-align: center;
            font-size: 13px;
            line-height: 18px;
            margin-bottom: 30px;
        }

        .form-input-app {
            max-width: 100%;
            width: 100%;
            font-size: 16px;
            height: 60px;
        }

        .custom-select {
            max-width: 100%;
        }

        .custom-select-trigger {
            height: 60px;
            font-size: 16px;
        }

        .custom-select-dropdown {
            position: absolute;
            z-index: 999999;
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

        .application-title {
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

<div class="design-page">
    <!-- Hero Section -->
    <div class="hero-section" style="overflow:hidden;">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ __('messages.design.title') }}</h1>
            <p class="hero-description">{!! __('messages.design.hero.description') !!}</p>
            <button class="hero-button" onclick="document.getElementById('application').scrollIntoView({behavior: 'smooth'})">
                {{ __('messages.design.hero.button') }}
            </button>
        </div>
        <!-- Градиентный блюр внутри hero -->
        <div style="position:absolute;bottom:0;left:0;width:100%;height:250px;z-index:8;background:linear-gradient(to bottom,transparent 0%,rgba(16,2,43,0.7) 55%,#10022B 100%);pointer-events:none;"></div>
    </div>
    <!-- Сплошная полоска перекрывает sub-pixel зазор -->
    <div style="position:relative;z-index:20;margin-top:-3px;height:4px;background:#10022B;pointer-events:none;"></div>

    <!-- Services Section -->
    <div class="content-wrapper" style="padding-top: 100px;">
        <h2 class="section-title">{{ __('messages.design.services_title') }}</h2>
        
        <div class="services-grid">
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_1.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_1.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
            
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_2.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_2.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
            
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_3.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_3.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
            
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_4.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_4.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
            
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_5.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_5.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
            
            <div class="service-card">
                <div class="service-info">
                    <div class="service-title">{{ __('messages.design.service_6.title') }}</div>
                    <div class="service-description">{{ __('messages.design.service_6.desc') }}</div>
                </div>
                <div class="service-arrow"></div>
            </div>
        </div>
    </div>
    
    <!-- Projects Section -->
    <div class="content-wrapper">
        <div class="projects-section">
            <h2 class="section-title">{{ __('messages.design.projects.title') }}</h2>

            <div class="projects-slider">
                <div class="project-card">
                    <div class="project-bg" style="background: url('/public/home_project_1.jpg') center/cover no-repeat;"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">{{ __('messages.design.project.1.title') }}</div>
                            <div class="project-description">{{ __('messages.design.project.1.desc') }}</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg" style="background: url('/public/home_project_2.jpg') center/cover no-repeat;"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">{{ __('messages.design.project.2.title') }}</div>
                            <div class="project-description">{{ __('messages.design.project.2.desc') }}</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg" style="background: url('/public/home_project_3.jpg') center/cover no-repeat;"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">{{ __('messages.design.project.3.title') }}</div>
                            <div class="project-description">{{ __('messages.design.project.3.desc') }}</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg" style="background: url('/public/home_project_4.jpg') center/cover no-repeat;"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">{{ __('messages.design.project.4.title') }}</div>
                            <div class="project-description">{{ __('messages.design.project.4.desc') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="projects-btn-wrapper">
                <a href="/projects" class="projects-circle-btn" aria-label="{{ __('messages.design.projects.all') }}">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
                <span class="projects-circle-label">{{ __('messages.design.projects.all') }}</span>
            </div>
        </div>
    </div>
    
    <!-- Application Form Section -->
    <div class="content-wrapper">
        <div class="application-section" id="application">
            <div class="application-form">
                <h2 class="application-title">{{ __('messages.form.title') }}</h2>
                <p class="application-text">{{ __('messages.form.subtitle') }}</p>

                <form id="designForm">
                    <input type="text" name="name" class="form-input-app" placeholder="{{ __('messages.form.name') }}" required>
                    <input type="tel" name="phone" class="form-input-app" placeholder="{{ __('messages.form.phone') }}" required>
                    <button type="submit" class="submit-button">{{ __('messages.form.submit') }}</button>
                </form>
            </div>
            
            <div class="application-image"></div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.getElementById('designForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const phone = this.querySelector('[name="phone"]').value.trim();
    if (!/^[\d\s\+\-\(\)]{7,16}$/.test(phone)) { alert('Введите корректный номер телефона'); return; }

    const formData = {
        name: this.querySelector('[name="name"]').value.trim(),
        phone,
        service: 'Проектирование',
        source: 'Проектирование'
    };

    try {
        const response = await fetch('/api/submit', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(formData)
        });

        const data = await response.json();

        if (data.success) {
            const modal = document.getElementById('thankYouModal');
            if (modal) { modal.classList.remove('hidden'); modal.style.display = 'flex'; }
            this.reset();
        } else {
            alert('Ошибка: ' + (data.message || 'Попробуйте ещё раз'));
        }
    } catch (error) {
        alert('Ошибка при отправке формы');
    }
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
@endpush
@endsection
