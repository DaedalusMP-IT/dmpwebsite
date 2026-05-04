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

    .hero-section {
        position: relative;
        width: 100%;
        height: 100vh;
        max-height: 800px;
        overflow: hidden;
        display: flex;
        background: #10022B;
        align-items: flex-end;
    }
    
    .hero-bg-image {
        position: absolute;
        width: 100%;
        height: 100%;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('/public/hero_vacancies.jpg') center/cover;
    }

    .hero-overlay {
        display: none;
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        max-width: 1150px;
        margin: 0 auto;
        padding: 0 20px 60px;
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
        border-radius: 12px;
        height: 300px;
        background-size: cover;
        background-position: center;
    }

    .team-photo:nth-child(1) {
        background: url('/public/team_1.jpg') center/cover no-repeat;
    }

    .team-photo:nth-child(2) {
        background: url('/public/team_2.jpg') center/cover no-repeat;
    }

    .team-photo:nth-child(3) {
        background: url('/public/team_3.jpg') center/cover no-repeat;
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
        background: url('/public/team_4.jpg') center/cover no-repeat;
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

        .hero-fade-bottom {
            height: 55%;
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
    <div class="hero-section" style="overflow:hidden;">
        <div class="hero-bg-image"></div>
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">{{ __('messages.vacancies.title') }}</h1>
            <p class="hero-subtitle">{{ __('messages.vacancies.hero.subtitle') }}</p>
            <button class="hero-button" onclick="document.getElementById('vacancies-list').scrollIntoView({behavior: 'smooth'})">
                {{ __('messages.vacancies.hero.button') }}
            </button>
        </div>
        <!-- Градиентный блюр внутри hero -->
        <div style="position:absolute;bottom:0;left:0;width:100%;height:250px;z-index:8;background:linear-gradient(to bottom,transparent 0%,rgba(16,2,43,0.7) 55%,#10022B 100%);pointer-events:none;"></div>
    </div>
    <!-- Сплошная полоска перекрывает sub-pixel зазор -->
    <div style="position:relative;z-index:20;margin-top:-3px;height:4px;background:#10022B;pointer-events:none;"></div>

    <!-- Team Section -->
    <div class="content-wrapper">
        <h2 class="section-title">{{ __('messages.vacancies.team.title') }}</h2>
        <div class="team-photos">
            <div class="team-photo"></div>
            <div class="team-photo"></div>
            <div class="team-photo"></div>
        </div>
    </div>
    
    <!-- Interview Process Section -->
    <div class="content-wrapper">
        <div class="interview-section">
            <h2 class="section-title">{{ __('messages.vacancies.interview.title') }}</h2>

            <div class="interview-image"></div>

            <div class="interview-steps">
                <div class="interview-step">
                    <div class="step-number">1</div>
                    <div class="step-box">{{ __('messages.vacancies.interview.step1') }}</div>
                </div>

                <div class="interview-step">
                    <div class="step-number">2</div>
                    <div class="step-box">{{ __('messages.vacancies.interview.step2') }}</div>
                </div>

                <div class="interview-step">
                    <div class="step-number">3</div>
                    <div class="step-box">{{ __('messages.vacancies.interview.step3') }}</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Vacancies List Section -->
    <div class="content-wrapper">
        <div class="vacancies-list-section" id="vacancies-list">
            <h2 class="section-title">{{ __('messages.vacancies.list.title') }}</h2>

            @php $vacancies = [1,2,3,4,5,6]; @endphp
            @foreach($vacancies as $i)
            <div class="vacancy-card">
                <div class="vacancy-info">
                    <div class="vacancy-title">{{ __("messages.vacancies.vacancy.$i.title") }}</div>
                    <div class="vacancy-description">{{ __("messages.vacancies.vacancy.$i.desc") }}</div>
                </div>
                <button class="vacancy-button" onclick="openApplyModal('{{ __("messages.vacancies.vacancy.$i.title") }}')">{{ __('messages.apply') }}</button>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Apply Modal -->
<div id="applyModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.6); z-index:99999; align-items:center; justify-content:center;">
    <div style="background:#1A0B3A; border:1px solid rgba(248,243,252,0.15); border-radius:16px; padding:40px; width:100%; max-width:420px; margin:16px; position:relative; text-align:center;">
        <button onclick="closeApplyModal()" style="position:absolute; top:16px; right:16px; background:none; border:none; color:#F8F3FC; font-size:20px; cursor:pointer;">✕</button>
        <h3 style="color:#F8F3FC; font-size:20px; font-weight:700; margin-bottom:8px;">{{ __('messages.vacancies.modal.title') }}</h3>
        <p id="applyVacancyTitle" style="color:rgba(248,243,252,0.6); font-size:14px; margin-bottom:28px;"></p>
        <p style="color:rgba(248,243,252,0.7); font-size:15px; margin-bottom:16px;">{{ __('messages.vacancies.modal.instructions') }}</p>
        <a href="mailto:info@daedalus.kz?subject=Отклик на вакансию"
           style="display:inline-block; background:#810EC7; color:#F8F3FC; font-size:16px; font-weight:600; padding:14px 28px; border-radius:12px; text-decoration:none;">
            info@daedalus.kz
        </a>
        <p style="color:rgba(248,243,252,0.4); font-size:12px; margin-top:16px;">{{ __('messages.vacancies.modal.footer') }}</p>
    </div>
</div>

@push('scripts')
<script>
function openApplyModal(title) {
    document.getElementById('applyVacancyTitle').textContent = title;
    const link = document.querySelector('#applyModal a[href^="mailto"]');
    if (link) link.href = 'mailto:info@daedalus.kz?subject=Отклик на вакансию: ' + encodeURIComponent(title);
    document.getElementById('applyModal').style.display = 'flex';
}

function closeApplyModal() {
    document.getElementById('applyModal').style.display = 'none';
}

document.getElementById('applyModal').addEventListener('click', function(e) {
    if (e.target === this) closeApplyModal();
});
</script>
@endpush
@endsection
