@extends('layouts.app')

@section('title', __('messages.vacancies.title') . ' - DAEDALUS')

@section('content')
<style>
    .vacancies-page {
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
    
    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        max-height: 800px;
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
        padding: 0 20px 80px;
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
    
    .hero-subtitle {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        margin-bottom: 40px;
        max-width: 547px;
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
    }
    
    .section-title {
        font-weight: 600;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        margin-bottom: 20px;
        margin-top: 100px;
    }
    
    .section-text {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        max-width: 565px;
        margin-bottom: 60px;
    }
    
    .team-photos {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
        margin-top: 60px;
    }

    .team-photo {
        border-radius: 20px;
        height: 320px;
        background-size: cover;
        background-position: center;
    }

    .team-photo:nth-child(1) {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .team-photo:nth-child(2) {
        background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .team-photo:nth-child(3) {
        background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    @media (max-width: 768px) {
        .team-photos {
            grid-template-columns: 1fr;
        }
    }
    
    .interview-section {
        margin-top: 100px;
        position: relative;
    }
    
    .interview-image {
        position: absolute;
        left: 0;
        top: 156px;
        width: 435px;
        height: 389px;
        background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        border-radius: 20px;
    }
    
    .interview-steps {
        margin-left: auto;
        width: fit-content;
        display: flex;
        flex-direction: column;
        gap: 30px;
        margin-top: 80px;
    }
    
    .interview-step {
        display: flex;
        align-items: center;
        gap: 30px;
    }
    
    .step-number {
        font-weight: 700;
        font-size: 80px;
        line-height: 106px;
        color: #F8F3FC;
        width: 45px;
        flex-shrink: 0;
    }
    
    .step-box {
        display: flex;
        align-items: center;
        padding: 28px 35px;
        width: 565px;
        background: rgba(248, 243, 252, 0.1);
        border: 1px solid rgba(248, 243, 252, 0.2);
        backdrop-filter: blur(101.28px);
        border-radius: 12px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
    }
    
    .vacancies-list-section {
        margin-top: 120px;
        margin-bottom: 80px;
    }
    
    .vacancy-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 45px 30px;
        background: rgba(248, 243, 252, 0.1);
        border: 1px solid rgba(248, 243, 252, 0.2);
        backdrop-filter: blur(101.28px);
        border-radius: 20px;
        margin-bottom: 17px;
    }
    
    .vacancy-info {
        display: flex;
        flex-direction: column;
        gap: 10px;
        max-width: 707px;
    }
    
    .vacancy-title {
        font-weight: 700;
        font-size: 18px;
        line-height: 24px;
        color: #F8F3FC;
    }
    
    .vacancy-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
    }
    
    .vacancy-button {
        display: inline-flex;
        justify-content: center;
        align-items: center;
        padding: 22px 43px;
        background: #810EC7;
        border-radius: 12px;
        font-weight: 400;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
        white-space: nowrap;
    }
    
    .vacancy-button:hover {
        background: #9a1ee8;
    }
    
    /* Responsive Design */
    @media (max-width: 1200px) {
        .interview-image {
            position: relative;
            left: 0;
            top: 0;
            margin-bottom: 40px;
            width: 100%;
            max-width: 435px;
        }
        
        .interview-steps {
            margin-left: 0;
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

        .hero-subtitle {
            display: block;
            font-size: 13px;
            line-height: 18px;
            max-width: 300px;
            margin-bottom: 25px;
            text-align: center;
        }

        .hero-button {
            width: 100%;
            max-width: 335px;
            padding: 16px 32px;
            font-size: 14px;
        }

        .content-wrapper {
            padding: 0 20px;
        }

        .section-title {
            font-size: 24px;
            line-height: 32px;
            margin-top: 60px;
            margin-bottom: 20px;
            text-align: center;
        }

        .section-text {
            font-size: 14px;
            line-height: 20px;
            margin-bottom: 30px;
            max-width: 100%;
            text-align: center;
        }

        .team-photos {
            flex-direction: column;
            gap: 20px;
            margin-top: 30px;
        }

        .team-photo {
            width: 100% !important;
            height: 200px;
        }

        .interview-section {
            margin-top: 60px;
        }

        .interview-image {
            display: none;
        }

        .interview-steps {
            margin-top: 40px;
            gap: 20px;
        }

        .interview-step {
            flex-direction: row;
            align-items: flex-start;
            gap: 15px;
        }

        .step-number {
            font-size: 48px;
            line-height: 60px;
            width: auto;
            flex-shrink: 0;
        }
        
        .step-box {
            width: 100%;
            padding: 20px;
            font-size: 14px;
            line-height: 20px;
        }

        .vacancies-list-section {
            margin-top: 60px;
            margin-bottom: 60px;
        }
        
        .vacancy-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 20px;
            padding: 24px;
        }

        .vacancy-info {
            width: 100%;
        }

        .vacancy-title {
            font-size: 16px;
            line-height: 22px;
        }

        .vacancy-description {
            font-size: 14px;
            line-height: 20px;
        }
        
        .vacancy-button {
            width: 100%;
            font-size: 14px;
            padding: 16px 24px;
        }
    }

</style>

<div class="vacancies-page">
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">Вакансии</h1>
            <p class="hero-subtitle">Присоединяйся к нашей команде и стань частью профессионалов</p>
            <button class="hero-button" onclick="document.getElementById('vacancies-list').scrollIntoView({behavior: 'smooth'})">
                Оставить заявку
            </button>
        </div>
    </div>
    
    <!-- Team Section -->
    <div class="content-wrapper">
        <h2 class="section-title">Познакомьтесь с нашей командой</h2>
        <div class="team-photos">
            <div class="team-photo"></div>
            <div class="team-photo"></div>
            <div class="team-photo"></div>
        </div>
    </div>
    
    <!-- Interview Process Section -->
    <div class="content-wrapper">
        <div class="interview-section">
            <h2 class="section-title">Как проходит собеседование</h2>
            
            <div class="interview-image"></div>
            
            <div class="interview-steps">
                <div class="interview-step">
                    <div class="step-number">1</div>
                    <div class="step-box">Предварительное собеседование</div>
                </div>
                
                <div class="interview-step">
                    <div class="step-number">2</div>
                    <div class="step-box">Собеседование в реальной жизни и знакомство с командой</div>
                </div>
                
                <div class="interview-step">
                    <div class="step-number">3</div>
                    <div class="step-box">Приглашние на работу</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vacancies List Section -->
    <div class="content-wrapper">
        <div class="vacancies-list-section" id="vacancies-list">
            <h2 class="section-title">Мы всегда рады талантливым людям</h2>
            
            <div class="vacancy-card">
                <div class="vacancy-info">
                    <div class="vacancy-title">Full Stack Developer</div>
                    <div class="vacancy-description">Требуется опыт работы с Laravel, Vue.js, React. Разработка веб-приложений и интеграция с внешними сервисами.</div>
                </div>
                <button class="vacancy-button">{{ __('messages.apply') }}</button>
            </div>
            
            <div class="vacancy-card">
                <div class="vacancy-info">
                    <div class="vacancy-title">AR/VR Developer</div>
                    <div class="vacancy-description">Опыт разработки приложений дополненной и виртуальной реальности. Работа с Unity, Unreal Engine и современными VR-платформами.</div>
                </div>
                <button class="vacancy-button">{{ __('messages.apply') }}</button>
            </div>
            
            <div class="vacancy-card">
                <div class="vacancy-info">
                    <div class="vacancy-title">Project Manager</div>
                    <div class="vacancy-description">Управление проектами в сфере автоматизации и промышленного строительства. Опыт работы с командами от 5 человек.</div>
                </div>
                <button class="vacancy-button">{{ __('messages.apply') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection
