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
    
    /* Hide footer on contacts page */
    footer {
        display: none !important;
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
            <h1 class="form-title">Остались вопросы?</h1>
            <p class="form-subtitle">Наша команда готова ответить вам на любые вопросы, дать больше информации и помочь</p>
            
            <form id="contactForm">
                <input type="text" id="input" name="name" class="form-input" placeholder="Имя" required>
                <input type="tel" id="input1" name="phone" class="form-input" placeholder="Телефон" required>
                <textarea id="input2" name="message" class="form-textarea" placeholder="Сообщение" required></textarea>
                <button type="button" onclick="submitFeedback()" class="submit-button">Оставить сообщение</button>
            </form>
        </div>

        <!-- Contact Information -->
        <div class="contact-info-section">
            <h2 class="contact-title">Наши контакты</h2>
            
            <div class="contact-item">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                </div>
                <a href="tel:+77766231177" class="contact-text">8 (776) 623 11 77</a>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </div>
                <a href="mailto:info@daedalus.kz" class="contact-text">info@daedalus.kz</a>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <svg viewBox="0 0 24 24">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                </div>
                <a href="https://maps.google.com/?q=Алматы,+ул.+Фарида+Шарипова+134А" target="_blank" class="contact-text">Казахстан, 050000, г. Алматы, Ауэзовский район, мкр. Достык,<br>ул. Фарида Шарипова, д. 134А</a>
            </div>

            <div class="contact-item" style="margin-top: 20px; flex-direction: column; align-items: flex-start; gap: 4px;">
                <span class="contact-text" style="opacity: 0.6; font-size: 13px;">Реквизиты</span>
                <span class="contact-text">ТОО «Daedalus Mind Projects»</span>
                <span class="contact-text">БИН 061040010545</span>
                <span class="contact-text">ИИК KZ36601A861011654481</span>
                <span class="contact-text">АО «Народный Банк»</span>
                <span class="contact-text">БИК HSBKKZKX</span>
            </div>
            
            <div class="social-links">
                <a href="#" class="social-icon" aria-label="Instagram">
                    <svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                    </svg>
                </a>
                <a href="#" class="social-icon" aria-label="WhatsApp">
                    <svg viewBox="0 0 24 24">
                        <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                    </svg>
                </a>
                <a href="#" class="social-icon" aria-label="Facebook">
                    <svg viewBox="0 0 24 24">
                        <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                    </svg>
                </a>
                <a href="#" class="social-icon" aria-label="LinkedIn">
                    <svg viewBox="0 0 24 24">
                        <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/>
                        <rect x="2" y="9" width="4" height="12"/>
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{ asset('index.js') }}"></script>
@endpush
@endsection
