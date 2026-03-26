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

    .arvr-page {
        position: relative;
        width: 100%;
        background: #10022B;
        color: #F8F3FC;
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
    }

    .hero-background {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
    }

    .hero-background::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('/images/pexels-photo-3945661-enhanced.png') center/cover no-repeat;
        z-index: 0;
    }

    .hero-background::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, #15023C 77.25%, rgba(58, 5, 162, 0) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        width: 1150px;
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
        background: url('/images/3d_icon_of_arvr_glasses_without_background_c601te4mlj5rj0hu5bfo_1-enhanced-2.png') center/contain no-repeat;
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
        .glow-effect-1,
        .glow-effect-2 {
            display: none;
        }

        .hero-section {
            height: auto;
            min-height: 500px;
            display: flex;
            align-items: flex-end;
        }

        .hero-content {
            padding: 0 20px 50px;
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
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background"></div>
        <div class="hero-content">
            <h1 class="hero-title">VR решения для производственных достижений!</h1>
            <p class="hero-description">Обучение с VR, AR-поддержка технического обслуживания и 3D-моделирование процессов.</p>
            <a href="#application" class="hero-button">Оставить заявку</a>
        </div>
    </section>

    <div class="page-container">
        <!-- Services Section -->
        <section class="content-wrapper services-section">
            <h2 class="section-title">VR тренажеры и симуляторы</h2>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">VR-тренажеры для обучения и оптимизации производства</h3>
                        <p class="service-description">Разработка и внедрение VR-тренажеров, которые помогают обучать операторов и технический персонал в безопасной и реалистичной среде</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">Создание AR-приложений для поддержки обслуживания</h3>
                        <p class="service-description">Интерактивные инструкции и схемы для упрощения ремонта и технического обслуживания оборудования</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">3D-моделирование и визуализация производственных линий</h3>
                        <p class="service-description">Создание детализированных моделей для планирования и оптимизации</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>

                <div class="service-card">
                    <div class="service-info">
                        <h3 class="service-title">Интерактивные 3D карты для визуализации объектов</h3>
                        <p class="service-description">Цифровые интерактивные карты производственных объектов для навигации, мониторинга и оперативного планирования</p>
                    </div>
                    <div class="service-arrow"></div>
                </div>
            </div>
        </section>

        <!-- Application Form Section -->
        <section class="application-section" id="application">
            <div class="form-container">
                <h2 class="form-title">Выбрали услугу?</h2>
                <p>Тогда оставьте заявку, а мы с вами свяжемся</p>

                <form id="arvrForm" onsubmit="submitARVRForm(event)">
                    <div class="form-group">
                        <input type="text" name="name" class="form-input" placeholder="Имя" required>
                    </div>

                    <div class="form-group">
                        <input type="tel" name="phone" class="form-input" placeholder="Телефон" required>
                    </div>

                    <button type="submit" class="submit-button">Оставить заявку</button>
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
    const data = {
        name: formData.get('name'),
        number: formData.get('phone'),
        service: 'AR/VR обучение'
    };

    fetch('/api/submit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(text => {
        const jsonMatch = text.match(/\{.*\}/);
        if (jsonMatch) {
            const result = JSON.parse(jsonMatch[0]);
            alert('Спасибо! Ваша заявка отправлена.');
            event.target.reset();
        } else {
            throw new Error('Invalid response');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Произошла ошибка при отправке заявки. Пожалуйста, попробуйте позже.');
    });
}
</script>
@endsection
