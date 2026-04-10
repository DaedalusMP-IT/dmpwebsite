@extends('layouts.app')

@section('title', 'Новости - DAEDALUS')

@push('styles')
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

    .news-page {
        font-family: 'Involve', sans-serif;
        background: #10022B;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        padding: 120px 0 80px;
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

    .news-container {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        z-index: 2;
    }

    .news-title {
        font-weight: 700;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        text-align: center;
        margin-bottom: 80px;
    }

    .news-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 60px;
    }

    .news-card {
        position: relative;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(124, 58, 237, 0.5);
        box-shadow: 0 20px 60px rgba(124, 58, 237, 0.3);
    }

    .news-image {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.2);
        border-radius: 0;
    }

    .news-image::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
        border-radius: 50%;
        filter: blur(80px);
    }

    .news-card:nth-child(1) .news-image::before {
        background: none;
    }

    .news-card:nth-child(2) .news-image::before {
        background: none;
    }

    .news-card:nth-child(3) .news-image::before {
        background: none;
    }

    .news-card:nth-child(4) .news-image::before {
        background: none;
    }

    .news-card:nth-child(5) .news-image::before {
        background: none;
    }

    .news-card:nth-child(6) .news-image::before {
        background: rgba(129, 14, 199, 0.6);
    }

    .news-content {
        padding: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        flex: 1;
    }

    .news-date {
        font-weight: 400;
        font-size: 14px;
        line-height: 18px;
        color: rgba(248, 243, 252, 0.6);
    }

    .news-heading {
        font-weight: 700;
        font-size: 24px;
        line-height: 32px;
        color: #F8F3FC;
    }

    .news-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: rgba(248, 243, 252, 0.8);
        flex: 1;
    }

    .news-link {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        font-size: 16px;
        line-height: 21px;
        color: #7C3AED;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: 10px;
    }

    .news-link:hover {
        color: #9F67FF;
        gap: 15px;
    }

    .news-link::after {
        content: '→';
        font-size: 20px;
    }

    @media (max-width: 768px) {
        .hero-section {
            padding: 100px 20px 60px;
        }

        .hero-title {
            font-size: 32px;
            line-height: 40px;
        }

        .news-container {
            padding: 40px 20px 80px;
        }

        .news-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .news-card {
            padding: 24px;
        }

        .news-image {
            border-radius: 16px;
        }

        .news-title {
            font-size: 32px;
            line-height: 40px;
        }

        .news-heading {
            font-size: 18px;
            line-height: 24px;
            margin-bottom: 12px;
        }

        .news-date {
            font-size: 12px;
            margin-bottom: 12px;
        }

        .news-description {
            font-size: 13px;
            line-height: 20px;
            margin-bottom: 16px;
        }

        .read-more {
            font-size: 13px;
            padding: 10px 20px;
        }
    }

    @media (max-width: 480px) {
        .hero-title {
            font-size: 28px;
            line-height: 36px;
        }

        .news-card {
            padding: 20px;
        }

        .news-heading {
            font-size: 16px;
            line-height: 22px;
        }

        .news-description {
            font-size: 12px;
            line-height: 18px;
        }
    }
        }
    }
</style>
@endpush

@section('content')
<div class="news-page">
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    <div class="news-container">
        <h1 class="news-title">{{ __('messages.news.title') }}</h1>
        
        <div class="news-grid">
            <div class="news-card">
                <div class="news-image" style="background: url('/public/Dzhakishev_News.jpg') center 45%/cover no-repeat;"></div>
                <div class="news-content">
                    <p class="news-date">23 февр. 2024 г.</p>
                    <h3 class="news-heading">Команда Daedalus реализовала проект для Мухтара Джакишева</h3>
                    <p class="news-description">Команда Daedalus Mind Projects выполнила проектирование завода по производству никеля с применением уникальной казахстанской технологии гидрометаллургического передела, впервые разработанной и реализованной в Казахстане.</p>
                    <a href="https://www.youtube.com/watch?v=_ecIbW9Vu90" target="_blank" class="news-link">Смотреть</a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image" style="background: url('/public/News_2.jpg') center/cover no-repeat;"></div>
                <div class="news-content">
                    <h3 class="news-heading">Министр промышленности и новых технологий Таджикистана Шерали Олимович провел встречу с<br>Daedalus Mind Projects</h3>
                    <p class="news-description">В ходе встречи была достигнута договоренность о значительных инвестициях в горнорудный сектор страны. Наша компания, обладая значительным опытом в исследовании и разработке новых технологий переработки руд, намерена внести существенный вклад в развитие ГМК Таджикистана.</p>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image" style="background: url('/public/News_3.jpg') center/cover no-repeat;"></div>
                <div class="news-content">
                    <h3 class="news-heading">Был подписан меморандум о сотрудничестве между Горно-Бадахшанской автономной областью Таджикистана и Daedalus Mind Projects</h3>
                    <p class="news-description">Меморандум предусматривает совместные исследования и разработку месторождений редкоземельных металлов. Реализация этого соглашения позволит исследовать все стратегически важные месторождения страны, что станет значимым шагом в развитии данной отрасли.</p>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image" style="background: url('/public/News_4.jpg') center/cover no-repeat;"></div>
                <div class="news-content">
                    <p class="news-date">3 февр. 2024 г.</p>
                    <h3 class="news-heading">Участие Daedalus Mind Projects на Международном цифровом форуме Digital Almaty 2024</h3>
                    <p class="news-description">Команда на панельной сессии INDUSTRY X: ЦИФРОВАЯ ЭВОЛЮЦИЯ БУДУЩЕГО</p>
                    <a href="https://www.youtube.com/watch?v=k0ARcS-aI1s" target="_blank" class="news-link">Смотреть</a>
                </div>
            </div>

            <div class="news-card">
                <div class="news-image" style="background: url('/public/News_5.jpg') center/cover no-repeat;"></div>
                <div class="news-content">
                    <p class="news-date"></p>
                    <h3 class="news-heading">Almaty Hub (ex. Techgarden) у нас в гостях</h3>
                    <p class="news-description">Первое знакомство с Daedalus Mind Projects, специализирующаяся в области технологий переработки полезных ископаемых и проектирования промышленных предприятий. Все подробности в этом Reels по кнопке ниже.</p>
                    <a href="https://www.instagram.com/p/C6iAmNbiOq4/" target="_blank" class="news-link">Смотреть</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
