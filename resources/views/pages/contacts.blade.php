@extends('layouts.app')

@section('title', __('messages.contacts.title') . ' - DAEDALUS')

@section('content')
<style>
    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-Regular.woff2') format('woff2');
        font-weight: 400;
        font-style: normal;
    }
    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-Bold.woff2') format('woff2');
        font-weight: 700;
        font-style: normal;
    }
    @font-face {
        font-family: 'Involve';
        src: url('/fonts/Involve-SemiBold.woff2') format('woff2');
        font-weight: 600;
        font-style: normal;
    }
    
    .contacts-page {
        font-family: 'Involve', sans-serif;
        background: #1A0B3A;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        padding: 80px 20px 60px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    
    .content-wrapper {
        position: relative;
        z-index: 2;
        max-width: 1400px;
        margin: 0 auto;
        padding: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 120px;
        align-items: flex-start;
    }
    
    .contact-info-section {
        position: relative;
        width: 100%;
        margin-bottom: 0;
    }
    
    .contact-title {
        font-weight: 700;
        font-size: 36px;
        line-height: 48px;
        color: #F8F3FC;
        margin-bottom: 40px;
    }
    
    .form-section {
        width: 100%;
        max-width: 100%;
    }

    .form-title {
        font-weight: 600;
        font-size: 32px;
        line-height: 42px;
        color: #F8F3FC;
        margin-bottom: 12px;
    }

    .form-subtitle {
        font-weight: 400;
        font-size: 16px;
        line-height: 22px;
        color: rgba(248, 243, 252, 0.7);
        margin-bottom: 40px;
    }
    
    .form-input {
        width: 100%;
        height: 60px;
        background: rgba(248, 243, 252, 0.05);
        border: 1px solid rgba(248, 243, 252, 0.15);
        border-radius: 12px;
        padding: 0 20px;
        font-family: 'Involve', sans-serif;
        font-size: 14px;
        line-height: 19px;
        color: #F8F3FC;
        margin-bottom: 15px;
    }
    
    .form-input::placeholder {
        color: rgba(248, 243, 252, 0.5);
    }
    
    .form-input:focus {
        outline: none;
        border-color: rgba(248, 243, 252, 0.3);
        background: rgba(248, 243, 252, 0.08);
    }
    
    .form-textarea {
        width: 100%;
        height: 120px;
        background: rgba(248, 243, 252, 0.05);
        border: 1px solid rgba(248, 243, 252, 0.15);
        border-radius: 12px;
        padding: 18px 20px;
        font-family: 'Involve', sans-serif;
        font-size: 14px;
        line-height: 19px;
        color: #F8F3FC;
        resize: none;
        margin-bottom: 20px;
    }
    
    .form-textarea::placeholder {
        color: rgba(248, 243, 252, 0.5);
    }
    
    .form-textarea:focus {
        outline: none;
        border-color: rgba(248, 243, 252, 0.3);
        background: rgba(248, 243, 252, 0.08);
    }
    
    .submit-button {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 56px;
        background: #810EC7;
        border-radius: 12px;
        font-weight: 500;
        font-size: 16px;
        line-height: 21px;
        color: #F8F3FC;
        border: none;
        cursor: pointer;
        transition: background 0.3s;
    }
    
    .submit-button:hover {
        background: #9a1ee8;
    }
    
    .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
        margin-bottom: 24px;
    }
    
    .contact-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 2px;
    }
    
    .contact-icon svg {
        width: 24px;
        height: 24px;
        stroke: #F8F3FC;
        stroke-width: 1.5;
        fill: none;
    }
    
    .contact-text {
        font-weight: 400;
        font-size: 18px;
        line-height: 24px;
        color: #F8F3FC;
        word-break: break-word;
    }
    
    .social-links {
        display: flex;
        gap: 20px;
        margin-top: 35px;
    }
    
    .social-icon {
        width: 28px;
        height: 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.2s;
    }
    
    .social-icon:hover {
        transform: scale(1.15);
    }
    
    .social-icon svg {
        width: 28px;
        height: 28px;
        stroke: #F8F3FC;
        stroke-width: 1.5;
        fill: none;
    }
    
    .hamburger-menu {
        display: none;
        width: 24px;
        height: 24px;
        flex-direction: column;
        justify-content: space-between;
        cursor: pointer;
    }

    .hamburger-menu span {
        width: 100%;
        height: 2px;
        background: #F8F3FC;
        border-radius: 2px;
    }
    
    @media (max-width: 768px) {
        .contacts-page {
            padding: 60px 16px 40px;
        }

        .content-wrapper {
            max-width: 400px;
            grid-template-columns: 1fr;
            gap: 80px;
        }

        .contact-info-section {
            width: 100%;
        }

        .form-section {
            max-width: 100%;
        }
        
        .contact-title {
            font-size: 24px;
            line-height: 32px;
            margin-bottom: 24px;
        }

        .contact-text {
            font-size: 14px;
            line-height: 19px;
        }

        .contact-item {
            margin-bottom: 16px;
            align-items: flex-start;
        }

        .social-links {
            gap: 12px;
            margin-top: 20px;
        }

        .form-title {
            font-size: 20px;
            line-height: 27px;
        }

        .form-subtitle {
            font-size: 13px;
            line-height: 18px;
            margin-bottom: 24px;
        }
        
        .form-input,
        .form-textarea {
            font-size: 13px;
        }

        .form-input {
            height: 56px;
            margin-bottom: 12px;
        }

        .form-textarea {
            height: 100px;
            margin-bottom: 16px;
        }
        
        .submit-button {
            height: 52px;
            font-size: 14px;
        }
    }
</style>

<div class="contacts-page">
    <div class="content-wrapper">
        <!-- Contact Form -->
        <div class="form-section">
            <h1 class="form-title">{{ __('messages.contacts.form.title') }}</h1>
            <p class="form-subtitle">{{ __('messages.contacts.form.subtitle') }}</p>

            <form id="contactForm">
                <input type="hidden" id="source" value="{{ __('messages.contacts.form.source') }}">
                <input type="text" id="input" name="name" class="form-input" placeholder="{{ __('messages.contacts.form.name') }}" required>
                <input type="tel" id="input1" name="phone" class="form-input" placeholder="{{ __('messages.contacts.form.phone') }}" required>
                <button type="button" onclick="submitFeedback()" class="submit-button">{{ __('messages.form.submit') }}</button>
            </form>
        </div>

        <!-- Contact Information -->
            <div class="contact-info-section">
                            <h2 class="contact-title">{{ __('messages.contacts.our_contacts') }}</h2>
                                        
                            <div class="contact-item">
                        <div class="contact-icon">
                            <img src="/public/phone-icon.png" alt="Phone" style="width: 24px; height: 24px;">
                        </div>
                        <a href="tel:+77766231177" class="contact-text">8 (776) 623 11 77</a>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <img src="/public/mail-icon.png" alt="Email" style="width: 24px; height: 24px;">
                        </div>
                        <a href="mailto:info@daedalus.kz" class="contact-text">info@daedalus.kz</a>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <img src="/public/map-icon.png" alt="Location" style="width: 24px; height: 24px;">
                        </div>
                        <a href="https://www.google.com/maps/place/43%C2%B012'48.8%22N+76%C2%B049'50.1%22E/@43.213543,76.829912,18z/data=!3m1!4b1!4m4!3m3!8m2!3d43.213543!4d76.830581?entry=ttu&g_ep=EgoyMDI2MDQwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="contact-text">
                            {!! __('messages.contacts.address.full') !!}
                        </a>
                    </div>
                    
                

            <div class="contact-item" style="margin-top: 20px; flex-direction: column; align-items: flex-start; gap: 4px;">
                <span class="contact-text" style="opacity: 0.6; font-size: 13px;">{{ __('messages.contacts.requisites') }}</span>
                <span class="contact-text">ТОО «Daedalus Mind Projects»</span>
                <span class="contact-text">БИН 061040010545</span>
                <span class="contact-text">ИИК KZ36601A861011654481</span>
                <span class="contact-text">АО «Народный Банк»</span>
                <span class="contact-text">БИК HSBKKZKX</span>
            </div>
            
            <div class="social-links-container" style="display: flex; gap: 15px; margin-top: 20px;">
                        <a href="https://www.instagram.com/daedalus.qaz/" target="_blank" class="social-icon">
                            <img src="/public/instagram_icon.png" alt="Instagram" style="width: 34px; height: 34px; object-fit: contain;"> 
                        </a>
                        <a href="https://wa.me/77766231177" target="_blank" class="social-icon">
                            <img src="/public/whatsapp_icon.png" alt="WhatsApp" style="width: 34px; height: 34px; object-fit: contain;"> 
                        </a>
                        <a href="https://t.me/makhambet_s" target="_blank" class="social-icon">
                            <img src="/public/telegram_icon.png" alt="Telegram" style="width: 34px; height: 34px; object-fit: contain;"> 
                        </a>
                    </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('index.js') }}"></script>
@endpush
@endsection
