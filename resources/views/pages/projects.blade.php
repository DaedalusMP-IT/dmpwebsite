@extends('layouts.app')

@section('title', __('messages.projects.page.title'))

@section('content')
<style>
    .projects-page {
        font-family: 'Involve', sans-serif;
        background: #10022B;
        color: #F8F3FC;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        padding: 120px 0 80px;
    }

    .glow-effect-1, .glow-effect-2 { display: none; }

    .projects-container {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        z-index: 2;
    }

    .projects-title {
        font-weight: 700;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        text-align: center;
        margin-bottom: 80px;
    }

    .projects-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 60px;
    }

    .project-card {
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

    .project-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(124, 58, 237, 0.5);
        box-shadow: 0 20px 60px rgba(124, 58, 237, 0.3);
    }

    .project-images {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.2);
    }


    .project-info {
        padding: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        flex: 1;
    }

    .project-category {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #7C3AED;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .project-name {
        font-weight: 700;
        font-size: 24px;
        line-height: 32px;
        color: #F8F3FC;
    }

    .project-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: rgba(248, 243, 252, 0.8);
        flex: 1;
    }

    .project-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }

    .project-detail {
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: rgba(248, 243, 252, 0.7);
    }

    .project-detail strong {
        color: #F8F3FC;
        font-weight: 600;
    }

    .project-status {
        display: inline-block;
        width: fit-content;
        align-self: flex-start;
        background: rgba(124, 58, 237, 0.25);
        border: 1px solid rgba(124, 58, 237, 0.6);
        color: #c084fc;
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        padding: 2px 6px;
        border-radius: 4px;
        margin-bottom: 6px;
    }

    @media (max-width: 968px) {
        .projects-page {
            padding: 80px 0 60px;
        }
        .projects-title {
            font-size: 32px;
            line-height: 40px;
            margin-bottom: 40px;
        }
        .projects-list {
            grid-template-columns: 1fr;
            gap: 24px;
        }
        .project-name {
            font-size: 18px;
            line-height: 24px;
        }
        .project-description {
            font-size: 14px;
            line-height: 20px;
        }
        .project-images {
            height: 200px;
        }
    }

    @media (max-width: 480px) {
        .projects-title {
            font-size: 26px;
            line-height: 34px;
        }
        .project-info {
            padding: 20px;
        }
        .project-name {
            font-size: 16px;
            line-height: 22px;
        }
        .project-description {
            font-size: 13px;
            line-height: 18px;
        }
        .project-detail {
            font-size: 12px;
        }
    }
</style>

<div class="projects-page">
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>

    <div class="projects-container">
        <h1 class="projects-title">{{ __('messages.projects.title') }}</h1>

        <div class="projects-list">

            @foreach([
                ['img'=>'project_1.jpg','key'=>'1','status'=>false],
                ['img'=>'project_2.jpg','key'=>'2','status'=>false],
                ['img'=>'project_3.jpg','key'=>'3','status'=>false],
                ['img'=>'project_4.jpg','key'=>'4','status'=>false],
                ['img'=>'project_5.jpg','key'=>'5','status'=>false],
                ['img'=>'project_8.jpg','key'=>'6','status'=>false],
            ] as $p)
            <div class="project-card">
                <div class="project-images" style="background: url('/public/{{ $p["img"] }}') center/cover no-repeat;"></div>
                <div class="project-info">
                    @if($p['status'])<span class="project-status">{{ __('messages.projects.status.in_progress') }}</span>@endif
                    <p class="project-category">{{ __('messages.projects.category.industrial') }}</p>
                    <h3 class="project-name">{{ __("messages.projects.card.{$p['key']}.name") }}</h3>
                    <p class="project-description">{!! __("messages.projects.card.{$p['key']}.desc") !!}</p>
                    <div class="project-details">
                        <div class="project-detail"><strong>{{ __('messages.projects.detail.classification') }}</strong> {{ __("messages.projects.card.{$p['key']}.classification") }}</div>
                        @if(__("messages.projects.card.{$p['key']}.duration"))
                        <div class="project-detail"><strong>{{ __('messages.projects.detail.duration') }}</strong> {{ __("messages.projects.card.{$p['key']}.duration") }}</div>
                        <div class="project-detail"><strong>{{ __('messages.projects.detail.year') }}</strong> {{ __("messages.projects.card.{$p['key']}.year") }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endsection
