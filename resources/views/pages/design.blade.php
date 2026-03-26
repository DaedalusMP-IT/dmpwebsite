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
    
    /* Декоративные световые эффекты */
    .glow-effect-1 {
        position: absolute;
        width: 389px;
        height: 437px;
        left: -60px;
        top: 1358px;
        background: #F8F3FC;
        filter: blur(350px);
        z-index: 0;
    }
    
    .glow-effect-2 {
        position: absolute;
        width: 389px;
        height: 437px;
        right: 0;
        top: 916px;
        background: #F8F3FC;
        filter: blur(350px);
        z-index: 0;
    }
    
    /* Hero Section */
    .hero-section {
        position: relative;
        width: 100%;
        height: 728px;
        overflow: hidden;
        display: flex;
        align-items: flex-end;
    }
    
    .hero-bg-image {
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('/images/image.png') center/cover;
    }
    
    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, #15023C 77.25%, rgba(58, 5, 162, 0) 100%);
        z-index: 1;
    }
    
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px;
        padding-top: 160px;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding-top: 0;
        padding-bottom: 80px;
    }

    .hero-title {
        font-weight: 600;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        margin-bottom: 10px;
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
        margin-top: 100px;
    }
    
    /* Services Grid */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 70px;
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
        background: linear-gradient(135deg, rgba(255, 0, 150, 0.5) 0%, rgba(147, 51, 234, 0.4) 100%);
    }

    .service-card:nth-child(2) {
        background: linear-gradient(135deg, rgba(59, 130, 246, 0.5) 0%, rgba(37, 99, 235, 0.4) 100%);
    }

    .service-card:nth-child(3) {
        background: linear-gradient(135deg, rgba(168, 85, 247, 0.5) 0%, rgba(147, 51, 234, 0.4) 100%);
    }

    .service-card:nth-child(4) {
        background: linear-gradient(135deg, rgba(236, 72, 153, 0.5) 0%, rgba(219, 39, 119, 0.4) 100%);
    }

    .service-card:nth-child(5) {
        background: linear-gradient(135deg, rgba(34, 211, 238, 0.5) 0%, rgba(6, 182, 212, 0.4) 100%);
    }

    .service-card:nth-child(6) {
        background: linear-gradient(135deg, rgba(129, 14, 199, 0.5) 0%, rgba(88, 9, 141, 0.4) 100%);
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
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 12px;
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
        .glow-effect-1,
        .glow-effect-2 {
            display: none;
        }

        .hero-section {
            height: auto;
            min-height: 500px;
            padding: 0;
            display: flex;
            align-items: flex-end;
        }

        .hero-content {
            padding: 0 20px 50px;
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
            overflow: hidden;
        }

        .application-section::before {
            content: '';
            position: absolute;
            width: 250px;
            height: 250px;
            border-radius: 50%;
            background: linear-gradient(135deg, #810EC7 0%, #9a1ee8 100%);
            filter: blur(80px);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            animation: pulse 4s ease-in-out infinite;
            z-index: 0;
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
            font-size: 14px;
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
    <!-- Glow Effects -->
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Проектирование</h1>
            <p class="hero-description">Полный спектр услуг проектирования: от промышленных объектов до систем безопасности и автоматизации.</p>
            <button class="hero-button" onclick="document.getElementById('application').scrollIntoView({behavior: 'smooth'})">
                Оставить заявку
            </button>
        </div>
    </div>
    
    <!-- Services Section -->
    <div class="content-wrapper">
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
            <h2 class="section-title">Наши проекты</h2>

            <div class="projects-slider">
                <div class="project-card">
                    <div class="project-bg"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">Caravan Resources Group</div>
                            <div class="project-description">Завод по производству катодной меди</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">РИДДЕР-ПОЛИМЕТАЛЛ</div>
                            <div class="project-description">Обогатительная фабрика по переработке полиметаллической руды</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">AK SU KMG</div>
                            <div class="project-description">Новый опреснительный завод на берегу Каспийского моря</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">RESOURCES CAPITAL GROUP</div>
                            <div class="project-description">Горно-обогатительный комбинат на месторождении Акмая в Карагандинской обл.</div>
                        </div>
                    </div>
                </div>

                <div class="project-card">
                    <div class="project-bg"></div>
                    <div class="project-overlay">
                        <div class="project-info">
                            <div class="project-title">АО "MB Project Partners"</div>
                            <div class="project-description">Фиброцементный завод в г. Алматы</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="projects-btn-wrapper">
                <a href="/projects" class="projects-circle-btn" aria-label="Все проекты">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="5" y1="12" x2="19" y2="12"/>
                        <polyline points="12 5 19 12 12 19"/>
                    </svg>
                </a>
                <span class="projects-circle-label">Все проекты</span>
            </div>
        </div>
    </div>
    
    <!-- Application Form Section -->
    <div class="content-wrapper">
        <div class="application-section" id="application">
            <div class="application-form">
                <h2 class="application-title">Выбрали услугу?</h2>
                <p class="application-text">Тогда оставьте заявку, а мы с вами свяжемся</p>
                
                <form id="designForm">
                    <input type="text" name="name" class="form-input-app" placeholder="Имя" required>
                    <input type="tel" name="phone" class="form-input-app" placeholder="Телефон" required>
                    <button type="submit" class="submit-button">Оставить заявку</button>
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
    
    const formData = {
        name: this.querySelector('[name="name"]').value,
        phone: this.querySelector('[name="phone"]').value,
        service: 'Проектирование'
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
        
        const text = await response.text();
        const jsonMatch = text.match(/\{.*\}/);
        const data = jsonMatch ? JSON.parse(jsonMatch[0]) : JSON.parse(text);
        
        if (data.success) {
            alert('Заявка успешно отправлена!');
            this.reset();
        } else {
            alert('Ошибка: ' + (data.message || 'Неизвестная ошибка'));
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Произошла ошибка при отправке формы');
    }
});
</script>
@endpush
@endsection
