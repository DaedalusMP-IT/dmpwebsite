@extends('layouts.app')

@section('title', 'Лицензии - DAEDALUS')

@push('styles')
<style>
    @font-face { font-family: 'Involve'; src: url('/fonts/Involve-Regular.woff2') format('woff2'); font-weight: 400; }
    @font-face { font-family: 'Involve'; src: url('/fonts/Involve-SemiBold.woff2') format('woff2'); font-weight: 600; }
    @font-face { font-family: 'Involve'; src: url('/fonts/Involve-Bold.woff2') format('woff2'); font-weight: 700; }

    .licenses-page {
        font-family: 'Involve', sans-serif;
        background: #10022B;
        min-height: 0;
        position: relative;
        overflow: hidden;
        padding: 120px 0 60px;
    }

    .glow-effect-1 {
        position: absolute; width: 389px; height: 437px;
        left: -60px; top: 600px;
        background: rgba(124, 58, 237, 0.3);
        filter: blur(350px); z-index: 0;
    }
    .glow-effect-2 {
        position: absolute; width: 389px; height: 437px;
        right: 0; top: 200px;
        background: rgba(124, 58, 237, 0.3);
        filter: blur(350px); z-index: 0;
    }

    .licenses-container {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .licenses-title {
        font-weight: 700;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        margin-bottom: 60px;
    }

    /* Card — portrait 595:843 */
    .license-card {
        width: 380px;
        height: 539px;
        border-radius: 24px;
        overflow: hidden;
        position: relative;
        flex-shrink: 0;
        isolation: isolate;
    }

    /* Slides track — horizontal */
    .license-slides {
        display: flex;
        flex-direction: row;
        width: 500%;
        height: 100%;
        animation: slideLeft 25s ease-in-out infinite;
    }

    @keyframes slideLeft {
        0%   { transform: translateX(0); }
        16%  { transform: translateX(0); }
        20%  { transform: translateX(-20%); }
        36%  { transform: translateX(-20%); }
        40%  { transform: translateX(-40%); }
        56%  { transform: translateX(-40%); }
        60%  { transform: translateX(-60%); }
        76%  { transform: translateX(-60%); }
        80%  { transform: translateX(-80%); }
        96%  { transform: translateX(-80%); }
        100% { transform: translateX(0); }
    }

    /* Each slide fills full card */
    .license-slide {
        width: 20%;
        height: 100%;
        flex-shrink: 0;
        position: relative;
    }

    /* Background image placeholder */
    .slide-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
    }

    .license-slide:nth-child(1) .slide-image { background: url('/public/license-1.jpg') center/contain no-repeat, #1a0a3a; }
    .license-slide:nth-child(2) .slide-image { background: url('/public/license-2.jpg') center/contain no-repeat, #1a0a3a; }
    .license-slide:nth-child(3) .slide-image { background: url('/public/license-3.jpg') center/contain no-repeat, #1a0a3a; }
    .license-slide:nth-child(4) .slide-image { background: url('/public/license-4.jpg') center/contain no-repeat, #1a0a3a; }
    .license-slide:nth-child(5) .slide-image { background: url('/public/license-5.jpg') center/contain no-repeat, #1a0a3a; }

    /* Text overlay at bottom — two lines */
    .slide-info {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 40px 20px 20px;
        background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .slide-number {
        font-size: 11px;
        font-weight: 400;
        color: rgba(255,255,255,0.5);
    }

    .slide-name {
        font-weight: 600;
        font-size: 15px;
        line-height: 22px;
        color: #fff;
    }

    @media (max-width: 768px) {
        .licenses-page { padding: 100px 0 40px; }
        .licenses-title { font-size: 32px; line-height: 40px; margin-bottom: 30px; }
        .license-card {
            width: calc(100vw - 40px);
            height: calc((100vw - 40px) * 843 / 595);
        }
    }
</style>
@endpush

@section('content')
<div class="licenses-page">
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>

    <div class="licenses-container">
        <h1 class="licenses-title">Лицензии</h1>

        <div class="license-card">
            <div class="license-slides">

                <div class="license-slide">
                    <div class="slide-image"></div>
                    <div class="slide-info">
                        <span class="slide-number">01/05</span>
                        <span class="slide-name">Лицензия на проектирование<br>I категория</span>
                    </div>
                </div>

                <div class="license-slide">
                    <div class="slide-image"></div>
                    <div class="slide-info">
                        <span class="slide-number">02/05</span>
                        <span class="slide-name">Приложение к лицензии</span>
                    </div>
                </div>

                <div class="license-slide">
                    <div class="slide-image"></div>
                    <div class="slide-info">
                        <span class="slide-number">03/05</span>
                        <span class="slide-name">Приложение к лицензии</span>
                    </div>
                </div>

                <div class="license-slide">
                    <div class="slide-image"></div>
                    <div class="slide-info">
                        <span class="slide-number">04/05</span>
                        <span class="slide-name">Приложение к лицензии</span>
                    </div>
                </div>

                <div class="license-slide">
                    <div class="slide-image"></div>
                    <div class="slide-info">
                        <span class="slide-number">05/05</span>
                        <span class="slide-name">Приложение к лицензии</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
