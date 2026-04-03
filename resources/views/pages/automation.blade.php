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

<div class="glow-effect-1"></div>
<div class="glow-effect-2"></div>

<style>
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
        margin-bottom: 65px;
        display: flex;
        align-items: flex-end;
    }

    .hero-background {
        position: absolute;
        width: 100%;
        height: 100%;
        background: url('telegram-cloud-document-2-5443077256119345307.jpg') center/cover;
    }

    .hero-overlay {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(180deg, #15023C 77.25%, rgba(58, 5, 162, 0) 100%);
    }

    .hero-content {
        position: relative;
        padding-top: 0;
        padding-bottom: 80px;
        width: 1150px;
        margin: 0 auto;
        z-index: 2;
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
        width: 962px;
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
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
        background: linear-gradient(135deg, rgba(129, 14, 199, 0.2) 0%, rgba(21, 2, 60, 0.4) 100%);
        backdrop-filter: blur(101.28px);
    }

    /* Blur Effects */
    .blur-effect-1 {
        position: absolute;
        width: 389px;
        height: 437px;
        right: 328px;
        top: 1835px;
        background: #F8F3FC;
        filter: blur(350px);
        pointer-events: none;
        z-index: 0;
    }

    .blur-effect-2 {
        position: absolute;
        width: 389px;
        height: 437px;
        left: 12px;
        top: 1030px;
        background: #F8F3FC;
        filter: blur(350px);
        pointer-events: none;
        z-index: 0;
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
        .glow-effect-1,
        .glow-effect-2 {
            display: none;
        }

        .hero-section {
            height: auto;
            min-height: 500px;
            margin-bottom: 40px;
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

@include('components.header')

<div class="page-container">
    <!-- Blur Effects -->
    <div class="blur-effect-1"></div>
    <div class="blur-effect-2"></div>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-background"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">BIM Внедрение</h1>
            <p class="hero-description">Цифровое проектирование и информационное моделирование зданий и промышленных объектов на базе BIM-технологий.</p>
            <a href="#form" class="hero-button">Оставить заявку</a>
        </div>
    </section>

    <!-- Services Section -->
    <section class="content-wrapper services-section">
        <h2 class="section-title">Полный цикл BIM-внедрения для вашего объекта</h2>
        <div class="services-grid">
            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">Разработка BIM-модели объекта</h3>
                    <p class="service-description">Создание детальной информационной модели здания или промышленного объекта с полной параметризацией всех элементов</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">Координация и проверка на коллизии</h3>
                    <p class="service-description">Сведение моделей всех разделов проекта и автоматическое выявление пересечений конструкций до начала строительства</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">4D и 5D моделирование</h3>
                    <p class="service-description">Привязка графика строительства и сметной документации к BIM-модели для точного планирования сроков и бюджета</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">Разработка стандарта BIM для предприятия</h3>
                    <p class="service-description">Создание корпоративных требований к информационному моделированию, шаблонов и регламентов для устойчивого внедрения BIM</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">Обучение и сопровождение команды</h3>
                    <p class="service-description">Подготовка специалистов заказчика к работе с BIM-инструментами, онлайн и офлайн обучение, поддержка на всех этапах проекта</p>
                </div>
                <div class="service-arrow"></div>
            </div>

            <div class="service-card">
                <div class="service-info">
                    <h3 class="service-title">Передача исполнительной BIM-модели</h3>
                    <p class="service-description">Формирование и передача заказчику актуализированной модели «как построено» для последующей эксплуатации объекта</p>
                </div>
                <div class="service-arrow"></div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="application-section" id="form">
        <div class="form-container">
            <h2 class="form-title">Выбрали услугу?</h2>
            <p class="form-subtitle">Тогда оставьте заявку, а мы с вами свяжемся</p>
            <form id="automationForm">
                <input type="text" name="name" class="form-input" placeholder="Имя" required>
                <input type="tel" name="phone" class="form-input" placeholder="Телефон" required>
                <button type="submit" class="form-button">Оставить заявку</button>
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
    
    const formData = new FormData(this);
    
    fetch('/api/submit', {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        }
    })
    .then(response => response.text())
    .then(text => {
        const jsonMatch = text.match(/\{[\s\S]*\}/);
        if (jsonMatch) {
            const data = JSON.parse(jsonMatch[0]);
            if (data.success) {
                alert('Заявка успешно отправлена!');
                this.reset();
            } else {
                alert('Ошибка при отправке заявки');
            }
        } else {
            alert('Ошибка при отправке заявки');
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert('Ошибка при отправке заявки');
    });
});
</script>

</body>
</html>
