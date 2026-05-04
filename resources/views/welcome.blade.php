<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ __('messages.home.title') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        @font-face {
            font-family: 'Involve';
            src: url('/fonts/Involve-Light.ttf') format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Involve';
            src: url('/fonts/Involve-Regular.ttf') format('truetype');
            font-weight: 400;
            font-style: normal;
        }

        @font-face {
            font-family: 'Involve';
            src: url('/fonts/Involve-Medium.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Involve';
            src: url('/fonts/Involve-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
        }

        @font-face {
            font-family: 'Involve';
            src: url('/fonts/Involve-Bold.ttf') format('truetype');
            font-weight: 700;
            font-style: normal;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Involve', sans-serif;
        }

        /* === Глобальная типографика === */
        h1 { font-size: 54px; line-height: 1.2; font-weight: 700; }
        h2 { font-size: 42px; line-height: 1.25; font-weight: 700; }
        h3 { font-size: 24px; line-height: 1.3; font-weight: 700; }
        h4 { font-size: 18px; line-height: 1.4; font-weight: 600; }
        p  { font-size: 16px; line-height: 1.6; font-weight: 400; }

        @media (max-width: 968px) {
            h1 { font-size: 32px; }
            h2 { font-size: 26px; }
            h3 { font-size: 20px; }
            h4 { font-size: 16px; }
            p  { font-size: 14px; }
        }

        @media (max-width: 480px) {
            h1 { font-size: 28px; }
            h2 { font-size: 22px; }
            h3 { font-size: 18px; }
            h4 { font-size: 15px; }
            p  { font-size: 13px; }
        }

        html {
            overflow-x: hidden;
            max-width: 100vw;
        }

        body {
            font-family: 'Involve', sans-serif;
            background: #10022B;
            color: #fff;
            overflow-x: hidden;
            max-width: 100vw;
            position: relative;
        }
        
        /* Header fix */
        header {
            position: relative;
            z-index: 9999 !important;
        }

        #mobile-menu {
            z-index: 9998 !important;
        }

        #mobile-menu-button {
            position: relative;
            z-index: 9999 !important;
        }

        /* Декоративные световые эффекты */
        .glow-effect-1 {
            position: absolute;
            width: 389px;
            height: 437px;
            left: -60px;
            top: 1358px;
            background: rgba(124, 58, 237, 0.3);
            filter: blur(350px);
            z-index: 0;
        }

        .glow-effect-2 {
            position: absolute;
            width: 389px;
            height: 437px;
            right: 0;
            top: 916px;
            background: rgba(124, 58, 237, 0.3);
            filter: blur(350px);
            z-index: 0;
        }

        .page-container {
            width: 100%;
            max-width: 100vw;
            position: relative;
            overflow-x: hidden;
        }

        /* Hero Section */
        .hero-section {
            width: 100%;
            height: 100vh;
            position: relative;
            background: #10022B;
            display: flex;
            overflow: hidden;
            align-items: flex-end;
        }

        .hero-fade-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 30%;
            background: linear-gradient(to bottom, transparent 0%, rgba(16,2,43,0.6) 40%, #10022B 65%, #10022B 100%);
            z-index: 5;
            pointer-events: none;
        }

        .hero-gradient-1 {
            width: 1040.96px;
            height: 1038.04px;
            position: absolute;
            left: -219.38px;
            top: -187.79px;
            background: radial-gradient(50% 50% at 50% 50%, rgba(88, 28, 135, 0.3) 0%, rgba(88, 28, 135, 0) 100%);
            filter: blur(350px);
        }

        .hero-gradient-2 {
            width: 1040.96px;
            height: 1038.04px;
            position: absolute;
            left: 598.65px;
            top: 230.7px;
            background: radial-gradient(50% 50% at 50% 50%, rgba(88, 28, 135, 0.3) 0%, rgba(88, 28, 135, 0) 100%);
            filter: blur(350px);
        }

        .hero-content {
            width: 1400px;
            margin: 0 auto;
            padding-bottom: 120px;
            position: relative;
            z-index: 10;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .hero-title {
            color: white;
            font-size: 48px;
            font-family: 'Involve', sans-serif;
            font-weight: 700;
            line-height: 58px;
            word-wrap: break-word;
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        .hero-subtitle {
            max-width: 600px;
            color: #ffffff;
            font-size: 17px;
            font-family: 'Involve', sans-serif;
            font-weight: 300;
            line-height: 32px;
            word-wrap: break-word;
            margin-bottom: 40px;
            opacity: 0;
            animation: fadeInUp 1s 0.2s ease forwards;
            text-align: center;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
            opacity: 0;
            animation: fadeInUp 1s 0.4s ease forwards;
        }

        .btn-primary {
            width: 280px;
            height: 60px;
            background: rgba(255, 255, 255, 0.10);
            border-radius: 10px;
            border: 1px rgba(255, 255, 255, 0.20) solid;
            backdrop-filter: blur(101.28px);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-family: 'Involve', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-primary:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }

        .btn-secondary {
            width: 280px;
            height: 60px;
            background: linear-gradient(90deg, #7C3AED 0%, #5B21B6 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 18px;
            font-family: 'Involve', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(124, 58, 237, 0.4);
        }



        /* Stats */
        .stats-grid {
            display: flex;
            gap: 60px;
            margin-bottom: 30px;
        }

        .stat-item {}

        .stat-number {
            font-size: 72px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        .stat-label {
            font-size: 20px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .stats-grid { gap: 30px; }
            .stat-number { font-size: 48px; }
            .stat-label { font-size: 16px; }
        }

        /* Stats */
        .stats-grid {
            display: flex;
            gap: 60px;
            margin-bottom: 30px;
        }

        .stat-number {
            font-size: 72px;
            font-weight: 700;
            color: #fff;
            line-height: 1;
        }

        .stat-label {
            font-size: 20px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            margin-top: 8px;
        }

        @media (max-width: 768px) {
            .stats-grid { gap: 30px; }
            .stat-number { font-size: 48px; }
            .stat-label { font-size: 16px; }
        }

        /* Company Info Sections */
        .company-info-section {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 80px 40px;
            display: flex;
            align-items: center;
            gap: 100px;
            opacity: 0;
            transform: translateY(50px);
            transition: all 0.6s ease;
        }

        .company-info-section.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .company-info-section.reverse {
            flex-direction: row-reverse;
        }

        .company-info-text {
            flex: 1;
        }

        .company-info-title {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 20px;
            color: white;
        }

        .company-info-description {
            font-size: 16px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
        }

        .company-info-description strong {
            font-weight: 700;
            color: #fff;
        }

        .company-info-image {
            width: 500px;
            height: 400px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background-size: cover;
            background-position: center;
        }

        /* Directions Section */
        .directions-section {
            width: 100%;
            padding: 100px 0;
            background: transparent;
        }

        .directions-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 40px;
        }

        .directions-title {
            font-size: 48px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 60px;
            color: white;
        }

        .directions-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .direction-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 60px 40px;
            cursor: pointer;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            text-decoration: none;
            display: block;
        }

        .direction-card:hover {
            border-color: rgba(124, 58, 237, 0.5);
        }

        .direction-card-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 16px;
            color: white;
        }

        .direction-card-description {
            font-size: 15px;
            font-weight: 300;
            color: #ffffff;
            line-height: 1.6;
        }

        /* Construction Stages Section */
        .construction-section {
            width: 100%;
            min-height: 100vh;
            padding: 100px 0;
            background: transparent;
            position: relative;
            overflow: hidden;
        }

        .construction-container {
            max-width: 1200px;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            padding: 0 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .construction-title {
            font-family: 'Involve', sans-serif;
            font-weight: 600;
            font-size: 64px;
            line-height: 80px;
            color: #F8F3FC;
            margin-bottom: 60px;
            text-align: center;
        }

        .construction-grid {
            position: relative;
            width: 900px;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            gap: 40px;
            padding: 20px 0;
        }

        .stage-indicator {
            display: flex;
            gap: 12px;
            margin-top: 20px;
        }

        .stage-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(248, 243, 252, 0.2);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .stage-dot.active {
            background: #7C3AED;
            transform: scale(1.2);
        }

        .stage-dot:hover {
            background: rgba(124, 58, 237, 0.6);
        }

        .construction-card {
            position: relative;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 40px;
        }

        .circular-progress {
            position: relative;
            width: 250px;
            height: 250px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .circular-progress svg {
            width: 100%;
            height: 100%;
            display: block;
        }

        .circular-progress circle {
            fill: none;
            stroke-width: 10;
        }

        .circular-progress .bg-circle {
            stroke: rgba(255, 255, 255, 0.1);
        }

        .circular-progress .progress-circle {
            stroke: #7C3AED;
            stroke-linecap: round;
            stroke-dasharray: 565.48;
            stroke-dashoffset: 565.48;
            transition: stroke-dashoffset 1.5s ease;
        }

        .circular-progress .percentage-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-family: 'Involve', sans-serif;
            font-weight: 700;
            font-size: 64px;
            color: #F8F3FC;
            transition: opacity 0.4s ease;
        }

        .construction-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .construction-stage-title {
            font-family: 'Involve', sans-serif;
            font-weight: 600;
            font-size: 36px;
            line-height: 44px;
            color: #F8F3FC;
            margin-bottom: 20px;
            transition: opacity 0.3s ease;
        }

        .construction-stage-description {
            font-family: 'Involve', sans-serif;
            font-weight: 400;
            font-size: 20px;
            line-height: 32px;
            color: rgba(248, 243, 252, 0.8);
            transition: opacity 0.3s ease;
        }

        .construction-stage-time {
            font-family: 'Involve', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            color: rgba(248, 243, 252, 0.6);
            transition: opacity 0.3s ease;
            margin-top: 15px;
        }

        /* Projects Section */
        .projects-section {
            width: 100%;
            padding: 100px 0;
            background: transparent;
            position: relative;
        }

        .projects-container {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 40px;
        }

        .projects-title {
            font-family: 'Involve', sans-serif;
            font-weight: 600;
            font-size: 40px;
            line-height: 1.3;
            color: #F8F3FC;
            margin-bottom: 40px;
        }

        .projects-carousel {
            display: flex;
            gap: 20px;
            overflow-x: auto;
            padding: 20px 0;
            scroll-behavior: smooth;
        }

        .projects-carousel::-webkit-scrollbar {
            height: 8px;
        }

        .projects-carousel::-webkit-scrollbar-track {
            background: rgba(248, 243, 252, 0.1);
            border-radius: 10px;
        }

        .projects-carousel::-webkit-scrollbar-thumb {
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

        .project-overlay-title {
            font-family: 'Involve', sans-serif;
            font-weight: 700;
            font-size: 18px;
            line-height: 24px;
            color: #F8F3FC;
            margin-bottom: 20px;
        }

        .project-overlay-description {
            font-family: 'Involve', sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 21px;
            color: #F8F3FC;
        }

        /* Projects button wrapper */
        .projects-btn-wrapper {
            margin-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 10px;
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

        /* Projects circle button */
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

        /* Contact Form Section */
        .contact-section {
            width: 100%;
            min-height: 778px;
            background: transparent;
            position: relative;
            padding: 100px 0 80px;
            z-index: 10;
            overflow: visible;
        }

        .contact-container {
            position: relative;
            max-width: 1189px;
            margin: 0 auto;
            padding: 0 20px;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .contact-form-wrapper {
            max-width: 565px;
            overflow: visible;
        }

        .contact-main-title {
            font-weight: 600;
            font-size: 36px;
            line-height: 48px;
            color: #F8F3FC;
            margin-bottom: 20px;
            font-family: 'Involve', sans-serif;
        }

        .contact-subtitle {
            font-weight: 400;
            font-size: 16px;
            line-height: 21px;
            color: #F8F3FC;
            max-width: 460px;
            margin-bottom: 40px;
            font-family: 'Involve', sans-serif;
        }

        .contact-form {
            width: 100%;
            max-width: 565px;
        }

        .contact-info-section {
            width: 349px;
        }

        .contact-info-title {
            font-weight: 600;
            font-size: 36px;
            line-height: 48px;
            color: #F8F3FC;
            margin-bottom: 30px;
            font-family: 'Involve', sans-serif;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 10px;
        }

        .contact-icon {
            width: 28px;
            height: 28px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .contact-icon svg {
            width: 20px;
            height: 20px;
            stroke: #F8F3FC;
            stroke-width: 1.5;
            fill: none;
        }

        .contact-text {
            font-weight: 400;
            font-size: 16px;
            line-height: 21px;
            color: #F8F3FC;
            font-family: 'Involve', sans-serif;
            text-decoration: none;
        }

        a.contact-text:hover {
            color: rgba(255, 255, 255, 0.7);
        }

        .social-links {
            display: flex;
            gap: 6px;
            margin-top: 25px;
        }

        .social-icon {
            width: 25px;
            height: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }

        .social-icon:hover {
            transform: scale(1.1);
        }

        .social-icon svg {
            width: 20px;
            height: 20px;
            stroke: #F8F3FC;
            stroke-width: 1.5;
            fill: none;
        }

        .form-input {
            width: 100%;
            height: 70px;
            background: rgba(248, 243, 252, 0.1);
            border: 1px solid rgba(248, 243, 252, 0.2);
            backdrop-filter: blur(101.28px);
            border-radius: 12px;
            padding: 0 25px;
            font-family: 'Involve', sans-serif;
            font-size: 16px;
            line-height: 21px;
            color: #F8F3FC;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .form-input::placeholder {
            color: #F8F3FC;
            opacity: 0.8;
        }

        .custom-select {
            position: relative;
            width: 100%;
            margin-bottom: 20px;
        }

        .custom-select-trigger {
            width: 100%;
            height: 70px;
            background: rgba(248, 243, 252, 0.1);
            border: 1px solid rgba(248, 243, 252, 0.2);
            border-radius: 12px;
            padding: 0 25px;
            font-family: 'Involve', sans-serif;
            font-size: 16px;
            color: rgba(248, 243, 252, 0.8);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-sizing: border-box;
            user-select: none;
        }

        .custom-select-trigger.selected {
            color: #F8F3FC;
        }

        .custom-select-trigger svg {
            flex-shrink: 0;
            transition: transform 0.2s ease;
        }

        .custom-select.open .custom-select-trigger svg {
            transform: rotate(180deg);
        }

        .custom-select-dropdown {
            display: none;
            position: absolute;
            bottom: calc(100% + 4px);
            top: auto;
            left: 0;
            right: 0;
            background: #1a0445;
            border: 1px solid rgba(248, 243, 252, 0.2);
            border-radius: 12px;
            overflow: hidden;
            z-index: 99999;
            box-shadow: 0 -8px 32px rgba(0,0,0,0.5);
        }

        .custom-select.open .custom-select-dropdown {
            display: block;
        }

        .custom-select-option {
            padding: 14px 25px;
            font-family: 'Involve', sans-serif;
            font-size: 16px;
            color: #F8F3FC;
            cursor: pointer;
            transition: background 0.15s;
        }

        .custom-select-option:hover {
            background: rgba(124, 58, 237, 0.3);
        }

        .custom-select-option.active {
            background: rgba(124, 58, 237, 0.2);
            color: #c084fc;
        }

        .form-input:focus {
            outline: none;
            border-color: rgba(248, 243, 252, 0.4);
        }

        .form-textarea {
            width: 100%;
            height: 148px;
            background: rgba(248, 243, 252, 0.1);
            border: 1px solid rgba(248, 243, 252, 0.2);
            backdrop-filter: blur(101.28px);
            border-radius: 12px;
            padding: 25px;
            font-family: 'Involve', sans-serif;
            font-size: 16px;
            line-height: 21px;
            color: #F8F3FC;
            resize: none;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .form-textarea::placeholder {
            color: #F8F3FC;
            opacity: 0.8;
        }

        .form-textarea:focus {
            outline: none;
            border-color: rgba(248, 243, 252, 0.4);
        }

        .form-submit {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 22px 43px;
            width: 100%;
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
            font-family: 'Involve', sans-serif;
        }

        .form-submit:hover {
            background: #9a1ee8;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 1200px) {
            .contact-container {
                flex-direction: column;
            }
            
            .contact-info-section {
                margin-top: 60px;
                width: 100%;
                max-width: 565px;
            }
        }

        /* Responsive */
        @media (max-width: 1400px) {
            .hero-content,
            .company-info-section,
            .directions-container,
            .construction-container,
            .projects-container {
                width: 90%;
                padding-left: 20px;
                padding-right: 20px;
            }

            .directions-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: auto;
                min-height: 100vh;
                padding: 80px 0 40px;
            }

            .hero-title {
                font-size: 36px;
                line-height: 42px;
                margin-bottom: 20px;
            }

            .hero-subtitle {
                font-size: 14px;
                line-height: 20px;
                padding: 0;
                margin-left: -20px;
                margin-right: -20px;
                width: calc(100% + 40px);
                max-width: calc(100% + 40px);
            }

            .hero-buttons {
                flex-direction: column;
                gap: 15px;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                text-align: center;
                padding: 15px 30px;
            }

            .directions-section {
                padding: 60px 20px;
            }

            .directions-title {
                font-size: 32px;
                line-height: 38px;
                margin-bottom: 30px;
            }

            .directions-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .direction-card {
                padding: 30px 20px;
            }

            .direction-card-title {
                font-size: 24px;
                margin-bottom: 12px;
            }

            .direction-card-description {
                font-size: 14px;
                line-height: 20px;
            }

            .projects-section {
                padding: 60px 0;
            }

            .projects-container {
                width: 100%;
                padding: 0 20px;
            }

            .projects-title {
                font-size: 24px;
                line-height: 32px;
                margin-bottom: 30px;
            }

            .company-info-section {
                flex-direction: column !important;
                padding: 40px 20px;
                gap: 30px;
            }

            .company-info-text {
                width: 100%;
            }

            .company-info-title {
                font-size: 28px;
                line-height: 34px;
                margin-bottom: 16px;
            }

            .company-info-description {
                font-size: 14px;
                line-height: 22px;
            }

            .company-info-image {
                width: 100%;
                height: 250px;
            }

            .construction-section {
                min-height: 100vh;
                height: auto;
                background: #1A0B3A;
                padding: 100px 20px;
            }

            .construction-container {
                width: 100%;
                max-width: 100%;
                padding: 0 20px;
                align-items: center;
            }

            .construction-title {
                font-size: 28px;
                line-height: 37px;
                text-align: center;
                max-width: 320px;
                margin: 0 auto 60px;
            }

            .construction-grid {
                width: 100%;
                min-height: auto;
                flex-direction: column;
                align-items: center;
                gap: 40px;
            }

            .stage-indicator {
                display: flex;
                justify-content: center;
                gap: 12px;
                margin-top: 20px;
            }

            .stage-dot {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background: rgba(248, 243, 252, 0.2);
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .stage-dot.active {
                background: #7C3AED;
                transform: scale(1.2);
            }

            .stage-dot:hover {
                background: rgba(124, 58, 237, 0.6);
            }

            .construction-card {
                flex-direction: column;
                gap: 40px;
                align-items: center;
            }

            .circular-progress {
                width: 200px;
                height: 200px;
                margin: 0 auto;
            }

            .circular-progress circle {
                stroke-width: 12;
            }

            .circular-progress .percentage-text {
                font-size: 48px;
            }

            .construction-info {
                align-items: center;
                text-align: center;
            }

            .construction-stage-title {
                font-size: 24px;
                line-height: 32px;
            }

            .construction-stage-description {
                font-size: 14px;
                line-height: 19px;
                color: rgba(248, 243, 252, 0.7);
                margin-bottom: 30px;
            }

            .construction-stage-time {
                font-size: 14px;
                line-height: 19px;
                color: rgba(248, 243, 252, 0.5);
                margin-top: 0;
            }

            .contact-section {
                padding: 60px 0 40px;
                min-height: auto;
            }

            .contact-container {
                flex-direction: column;
                padding: 0 20px;
                gap: 30px;
                align-items: center;
            }

            .contact-form-wrapper {
                width: 100%;
                max-width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .contact-main-title {
                font-size: 22px;
                line-height: 28px;
                margin-bottom: 8px;
                text-align: center;
            }

            .contact-subtitle {
                font-size: 13px;
                line-height: 17px;
                margin-bottom: 20px;
                text-align: center;
            }

            .contact-form {
                width: 100%;
                max-width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .form-input {
                width: 100%;
                max-width: 335px;
                height: 55px;
                font-size: 16px;
                margin-bottom: 15px;
            }

            .custom-select {
                max-width: 335px;
                width: 100%;
            }

            .custom-select-trigger {
                height: 55px;
                font-size: 16px;
            }

            .custom-select-dropdown {
                position: absolute;
                z-index: 999999;
            }

            .form-textarea {
                width: 100%;
                max-width: 335px;
                height: 120px;
                font-size: 14px;
                margin-bottom: 15px;
            }

            .form-submit {
                width: 100%;
                max-width: 335px;
                height: 55px;
                font-size: 14px;
                padding: 18px 35px;
            }

            .contact-info-section {
                display: none;
            }

            .contact-info-title {
                font-size: 20px;
                line-height: 26px;
                margin-bottom: 16px;
            }

            .contact-text {
                font-size: 13px;
                line-height: 17px;
            }

            .contact-icon {
                width: 24px;
                height: 24px;
            }

            .contact-icon svg {
                width: 18px;
                height: 18px;
            }

            .social-icon {
                width: 22px;
                height: 22px;
            }

            .social-icon svg {
                width: 18px;
                height: 18px;
            }

            .glow-effect-1,
            .glow-effect-2,
            .hero-gradient-1,
            .hero-gradient-2 {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .hero-title {
                font-size: 28px;
                line-height: 34px;
            }

            .hero-subtitle {
                font-size: 13px;
                line-height: 19px;
            }

            .directions-title,
            .company-info-title,
            .construction-title {
                font-size: 24px;
                line-height: 30px;
            }

            .direction-card-title {
                font-size: 20px;
            }

            .btn-primary, .btn-secondary {
                padding: 12px 24px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var btn = document.getElementById('mobile-menu-button');
            var menu = document.getElementById('mobile-menu');
            if (btn && menu) {
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    menu.classList.toggle('hidden');
                });
            }
        });
    </script>
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    @include('components.header')
    
    <div class="page-container">
        <!-- Hero Section -->
        <section class="hero-section" style="overflow:hidden;">
            <!-- Video Background -->
            <video
                autoplay muted loop playsinline
                style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;pointer-events:none;z-index:0;"
            >
                <source src="/public/hero_video.mp4" type="video/mp4">
            </video>
            <div style="position:absolute;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.4);z-index:1;"></div>

            <div class="hero-content" style="z-index:3;">
                <h1 class="hero-title">{{ __('messages.home.hero.title') }}</h1>
                <p class="hero-subtitle">{!! __('messages.home.hero.subtitle') !!}</p>

                <div class="hero-buttons">
                    <a href="#contact" class="btn-primary">{{ __('messages.contact_us') }}</a>
                    <a href="#projects" class="btn-secondary">{{ __('messages.home.hero.btn_projects') }}</a>
                </div>
            </div>
            <!-- Градиентный блюр внутри hero -->
            <div style="position:absolute;bottom:0;left:0;width:100%;height:250px;z-index:2;background:linear-gradient(to bottom,transparent 0%,rgba(16,2,43,0.7) 55%,#10022B 100%);pointer-events:none;"></div>
        </section>
        <!-- Сплошная полоска перекрывает sub-pixel зазор (залезает поверх hero на 3px) -->
        <div style="position:relative;z-index:20;margin-top:-3px;height:4px;background:#10022B;pointer-events:none;"></div>

        <!-- Company Info Section 1: Кто мы -->
        <section class="company-info-section" data-scroll-section>
            <div class="company-info-text">
                <h2 class="company-info-title">{{ __('messages.home.about.title') }}</h2>
                <p class="company-info-description">{{ __('messages.home.about.description') }}</p>
            </div>
            <div class="company-info-image" style="background-image: url('/public/about_1.jpg');"></div>
        </section>

        <!-- Company Info Section 2: Статистика -->
        <section class="company-info-section reverse" data-scroll-section>
            <div class="company-info-text">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">{{ __('messages.home.stats.experience') }}</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">&gt;20</div>
                        <div class="stat-label">{{ __('messages.home.stats.projects') }}</div>
                    </div>
                </div>
                <p class="company-info-description">{{ __('messages.home.stats.description') }}</p>
            </div>
            <div class="company-info-image" style="background-image: url('/public/about_2.jpg'); background-size: 105%;"></div>
        </section>

        <!-- Company Info Section 3: Наша миссия -->
        <section class="company-info-section" data-scroll-section>
            <div class="company-info-text">
                <h2 class="company-info-title">{{ __('messages.home.mission.title') }}</h2>
                <p class="company-info-description">
                    {{ __('messages.home.mission.description') }} <strong>{{ __('messages.home.mission.highlight') }}</strong> {{ __('messages.home.mission.description2') }}
                </p>
            </div>
            <div class="company-info-image" style="background-image: url('/public/about_3.jpg');"></div>
        </section>

        <!-- Directions Section -->
        <section class="directions-section">
            <div class="directions-container">
                <h2 class="directions-title">{{ __('messages.home.directions.title') }}</h2>
                
                <div class="directions-grid">
                    <a href="/design" class="direction-card" style="background-image: linear-gradient(rgba(16,2,43,0.6), rgba(16,2,43,0.6)), url('/public/direction_design.jpg');">
                        <h3 class="direction-card-title">{{ __('messages.home.direction.design.title') }}</h3>
                        <p class="direction-card-description">
                            {{ __('messages.home.direction.design.desc') }}
                        </p>
                    </a>

                    <a href="/automation" class="direction-card" style="background-image: linear-gradient(rgba(16,2,43,0.6), rgba(16,2,43,0.6)), url('/public/direction_bim.jpg');">
                        <h3 class="direction-card-title">{{ __('messages.home.direction.automation.title') }}</h3>
                        <p class="direction-card-description">
                            {{ __('messages.home.direction.automation.desc') }}
                        </p>
                    </a>

                    <a href="/arvr" class="direction-card" style="background-image: linear-gradient(rgba(16,2,43,0.6), rgba(16,2,43,0.6)), url('/public/direction_arvr.jpg');">
                        <h3 class="direction-card-title">{{ __('messages.home.direction.arvr.title') }}</h3>
                        <p class="direction-card-description">
                            {{ __('messages.home.direction.arvr.desc') }}
                        </p>
                    </a>
                </div>
            </div>
        </section>

        <!-- Construction Stages Section -->
        <section class="construction-section">
            <div class="construction-container">
                <h2 class="construction-title">{{ __('messages.home.construction.title') }}<br><span style="font-weight: 400;">{{ __('messages.home.construction.subtitle') }}</span></h2>
                <div class="construction-card">
                    <!-- Большой круг -->
                    <div class="circular-progress">
                        <svg viewBox="0 0 250 250" style="transform: rotate(-90deg); width:100%; height:100%;">
                            <circle cx="125" cy="125" r="108" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="12"/>
                            <circle id="progress-circle" cx="125" cy="125" r="108" fill="none" stroke="#7C3AED" stroke-width="12"
                                stroke-linecap="round"
                                stroke-dasharray="678.6"
                                stroke-dashoffset="678.6"
                                style="transition: stroke-dashoffset 1.2s ease;"/>
                        </svg>
                        <div class="percentage-text" id="percent-text">0%</div>
                    </div>

                    <!-- Текст справа -->
                    <div class="construction-info">
                        <div id="stage-name" class="construction-stage-title">{{ __('messages.home.stage.1.name') }}</div>
                        <div class="stage-indicator" id="stage-dots">
                            <div class="stage-dot active"></div>
                            <div class="stage-dot"></div>
                            <div class="stage-dot"></div>
                            <div class="stage-dot"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
        (function() {
            var stages = [
                { name: '{{ __("messages.home.stage.1.name") }}', pct: 25  },
                { name: '{{ __("messages.home.stage.2.name") }}', pct: 50  },
                { name: '{{ __("messages.home.stage.3.name") }}', pct: 80  },
                { name: '{{ __("messages.home.stage.4.name") }}', pct: 100 },
            ];
            var current = 0;
            var circumference = 678.6;

            var circle   = document.getElementById('progress-circle');
            var pctText  = document.getElementById('percent-text');
            var stageName= document.getElementById('stage-name');
            var dots     = document.querySelectorAll('.stage-dot');

            function setStage(i) {
                var s = stages[i];
                var offset = circumference - (s.pct / 100) * circumference;

                circle.style.strokeDashoffset = circumference; // сброс
                pctText.style.opacity = '0';
                stageName.style.opacity = '0';

                setTimeout(function() {
                    circle.style.strokeDashoffset = offset;
                    pctText.textContent = s.pct + '%';
                    stageName.textContent = s.name;
                    pctText.style.opacity = '1';
                    stageName.style.opacity = '1';
                }, 100);

                dots.forEach(function(d, idx) {
                    d.classList.toggle('active', idx === i);
                });
            }

            setStage(0);

            setInterval(function() {
                current = (current + 1) % stages.length;
                setStage(current);
            }, 3000);
        })();
        </script>

        <!-- Projects Section -->
        <section class="projects-section" id="projects">
            <div class="projects-container">
                <h2 class="projects-title">{{ __('messages.home.projects.title') }}</h2>

                <div class="projects-carousel">
                    <div class="project-card">
                        <div class="project-bg" style="background: url('/public/home_project_1.jpg') center/cover no-repeat;"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">{{ __('messages.home.project.1.title') }}</div>
                                <div class="project-overlay-description">{{ __('messages.home.project.1.desc') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg" style="background: url('/public/home_project_2.jpg') center/cover no-repeat;"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">{{ __('messages.home.project.2.title') }}</div>
                                <div class="project-overlay-description">{{ __('messages.home.project.2.desc') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg" style="background: url('/public/home_project_3.jpg') center/cover no-repeat;"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">{{ __('messages.home.project.3.title') }}</div>
                                <div class="project-overlay-description">{{ __('messages.home.project.3.desc') }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg" style="background: url('/public/home_project_4.jpg') center/cover no-repeat;"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">{{ __('messages.home.project.4.title') }}</div>
                                <div class="project-overlay-description">{{ __('messages.home.project.4.desc') }}</div>
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
                    <span class="projects-circle-label">{{ __('messages.home.projects.all') }}</span>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="contact-container">
                <div class="contact-form-wrapper">
                    <h1 class="contact-main-title">{{ __('messages.home.contact.title') }}</h1>
                    <p class="contact-subtitle">{{ __('messages.home.contact.subtitle') }}</p>

                    <form class="contact-form" id="contactForm">
                        <input type="hidden" id="source" value="{{ __('messages.nav.home') }}">
                        <input type="text" id="input" name="name" class="form-input" placeholder="{{ __('messages.form.name') }}" required>
                        <input type="tel" id="input1" name="phone" class="form-input" placeholder="{{ __('messages.form.phone') }}" required>
                        <button type="button" onclick="submitFeedback()" class="form-submit">{{ __('messages.form.submit') }}</button>
                    </form>
                </div>
                
                        <div class="contact-info-section">
                            <h2 class="contact-info-title">{{ __('messages.home.contact.info') }}</h2>
                                        
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
                    
                    <div class="social-links-container" style="display: flex; gap: 15px; margin-top: 20px;">
                        <a href="https://www.instagram.com/daedalus.qaz/" target="_blank" class="social-icon">
                            <img src="/public/instagram_icon.png" alt="Instagram" style="width: 24px; height: 24px; object-fit: contain;"> 
                        </a>
                        <a href="https://wa.me/77766231177" target="_blank" class="social-icon">
                            <img src="/public/whatsapp_icon.png" alt="WhatsApp" style="width: 24px; height: 24px; object-fit: contain;"> 
                        </a>
                        <a href="https://t.me/makhambet_s" target="_blank" class="social-icon">
                            <img src="/public/telegram_icon.png" alt="Telegram" style="width: 24px; height: 24px; object-fit: contain;"> 
                        </a>
                    </div> 
                </div> 
            </div> 
        </section> 
    </div>

    @include('components.footer')

    <script>
        // Company Info Sections Reveal on Scroll
        const observerOptions = {
            threshold: 0.2,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-scroll-section]').forEach(section => {
            observer.observe(section);
        });

        // Circular Progress Animation - Single Card with Scroll-based Stage Changes
        const constructionStages = [
            { percentage: 9,   title: '{{ __("messages.home.stage.1.name") }}', description: '{{ __("messages.home.stage.1.desc") }}', time: '{{ __("messages.home.stage.1.time") }}' },
            { percentage: 18,  title: '{{ __("messages.home.stage.2.name") }}', description: '{{ __("messages.home.stage.2.desc") }}', time: '{{ __("messages.home.stage.2.time") }}' },
            { percentage: 27,  title: '{{ __("messages.home.stage.3.name") }}', description: '{{ __("messages.home.stage.3.desc") }}', time: '{{ __("messages.home.stage.3.time") }}' },
            { percentage: 36,  title: '{{ __("messages.home.stage.4.name") }}', description: '{{ __("messages.home.stage.4.desc") }}', time: '{{ __("messages.home.stage.4.time") }}' },
            { percentage: 45,  title: '{{ __("messages.home.stage.5.name") }}', description: '{{ __("messages.home.stage.5.desc") }}', time: '{{ __("messages.home.stage.5.time") }}' },
            { percentage: 55,  title: '{{ __("messages.home.stage.6.name") }}', description: '{{ __("messages.home.stage.6.desc") }}', time: '{{ __("messages.home.stage.6.time") }}' },
            { percentage: 64,  title: '{{ __("messages.home.stage.7.name") }}', description: '{{ __("messages.home.stage.7.desc") }}', time: '{{ __("messages.home.stage.7.time") }}' },
            { percentage: 73,  title: '{{ __("messages.home.stage.8.name") }}', description: '{{ __("messages.home.stage.8.desc") }}', time: '{{ __("messages.home.stage.8.time") }}' },
            { percentage: 82,  title: '{{ __("messages.home.stage.9.name") }}', description: '{{ __("messages.home.stage.9.desc") }}', time: '{{ __("messages.home.stage.9.time") }}' },
            { percentage: 91,  title: '{{ __("messages.home.stage.10.name") }}', description: '{{ __("messages.home.stage.10.desc") }}', time: '{{ __("messages.home.stage.10.time") }}' },
            { percentage: 100, title: '{{ __("messages.home.stage.11.name") }}', description: '{{ __("messages.home.stage.11.desc") }}', time: '{{ __("messages.home.stage.11.time") }}' },
        ];

        const constructionSection = document.querySelector('.construction-section');
        const singleCard = document.getElementById('single-construction-card');
        const progressCircle = singleCard.querySelector('.progress-circle');
        const percentageText = document.getElementById('stage-percentage');
        const stageTitle = document.getElementById('stage-title');
        const stageDescription = document.getElementById('stage-description');
        const stageTime = document.getElementById('stage-time');
        
        const circumference = 565.48;
        progressCircle.style.strokeDasharray = circumference;
        progressCircle.style.strokeDashoffset = circumference;
        
        let currentStageIndex = 0;
        let isAnimating = false;
        
        const updateStage = (index) => {
            if (index < 0 || index >= constructionStages.length || isAnimating) return;
            
            isAnimating = true;
            currentStageIndex = index;
            const stage = constructionStages[index];
            
            // Fade out text
            stageTitle.style.opacity = '0';
            stageDescription.style.opacity = '0';
            stageTime.style.opacity = '0';
            
            setTimeout(() => {
                stageTitle.textContent = stage.title;
                stageDescription.textContent = stage.description;
                stageTime.textContent = stage.time;
                stageTitle.style.opacity = '1';
                stageDescription.style.opacity = '1';
                stageTime.style.opacity = '1';
            }, 150);
            
            // Animate circle and percentage
            let currentPercentage = parseInt(percentageText.textContent) || 0;
            const targetPercentage = stage.percentage;
            const increment = (targetPercentage - currentPercentage) / 30;
            
            const progressInterval = setInterval(() => {
                currentPercentage += increment;
                if ((increment > 0 && currentPercentage >= targetPercentage) || 
                    (increment < 0 && currentPercentage <= targetPercentage)) {
                    currentPercentage = targetPercentage;
                    clearInterval(progressInterval);
                    isAnimating = false;
                }
                
                const offset = circumference - (currentPercentage / 100) * circumference;
                progressCircle.style.strokeDashoffset = offset;
                percentageText.textContent = Math.round(currentPercentage) + '%';
            }, 20);
        };
        
        const stageIndicator = document.getElementById('stage-indicator');
        const constructionGrid = document.getElementById('construction-grid');
        
        // Create stage indicator dots
        constructionStages.forEach((stage, index) => {
            const dot = document.createElement('div');
            dot.className = 'stage-dot';
            if (index === 0) dot.classList.add('active');
            dot.addEventListener('click', () => {
                stopAutoPlay();
                updateStage(index);
                startAutoPlay();
            });
            stageIndicator.appendChild(dot);
        });
        
        let autoPlayInterval;
        const stageDuration = 2000; // 2 seconds
        
        const startAutoPlay = () => {
            autoPlayInterval = setInterval(() => {
                const nextIndex = (currentStageIndex + 1) % constructionStages.length;
                updateStage(nextIndex);
            }, stageDuration);
        };
        
        const stopAutoPlay = () => {
            clearInterval(autoPlayInterval);
        };
        
        // Pause on hover
        constructionGrid.addEventListener('mouseenter', stopAutoPlay);
        constructionGrid.addEventListener('mouseleave', startAutoPlay);
        
        // Update stage function to also update dots
        const updateStageWithDots = (index) => {
            if (index < 0 || index >= constructionStages.length || isAnimating) return;
            
            isAnimating = true;
            currentStageIndex = index;
            const stage = constructionStages[index];
            
            // Update dots - remove active from all, then add to current
            const allDots = document.querySelectorAll('.stage-dot');
            allDots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
            
            // Fade out text
            stageTitle.style.opacity = '0';
            stageDescription.style.opacity = '0';
            
            setTimeout(() => {
                stageTitle.textContent = stage.title;
                stageDescription.textContent = stage.description;
                stageTitle.style.opacity = '1';
                stageDescription.style.opacity = '1';
            }, 150);
            
            // Animate circle and percentage
            let currentPercentage = parseInt(percentageText.textContent) || 0;
            const targetPercentage = stage.percentage;
            const increment = (targetPercentage - currentPercentage) / 30;
            
            const progressInterval2 = setInterval(() => {
                currentPercentage += increment;
                if ((increment > 0 && currentPercentage >= targetPercentage) || 
                    (increment < 0 && currentPercentage <= targetPercentage)) {
                    currentPercentage = targetPercentage;
                    clearInterval(progressInterval2);
                    isAnimating = false;
                }
                
                const offset = circumference - (currentPercentage / 100) * circumference;
                progressCircle.style.strokeDashoffset = offset;
                percentageText.textContent = Math.round(currentPercentage) + '%';
            }, 20);
        };
        
        updateStage = updateStageWithDots;
        
        // Initialize first stage and start autoplay
        updateStage(0);
        startAutoPlay();

        // Contact Form Submission
        document.getElementById('contactForm').addEventListener('submit', async (e) => {
            e.preventDefault();
            
            const formData = new FormData(e.target);
            const data = Object.fromEntries(formData);

            try {
                const response = await fetch('/api/submit', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(data)
                });

                if (response.ok) {
                    alert('Спасибо! Мы свяжемся с вами в ближайшее время.');
                    e.target.reset();
                } else {
                    alert('Произошла ошибка. Пожалуйста, попробуйте позже.');
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Произошла ошибка. Пожалуйста, попробуйте позже.');
            }
        });
    </script>

    <script>
        var _activeDropdown = null;
        var _activeTrigger = null;

        function toggleServiceSelect() {
            var trigger = document.querySelector('#serviceSelect .custom-select-trigger');
            var dropdown = document.querySelector('#serviceSelect .custom-select-dropdown');
            if (_activeDropdown === dropdown) {
                closeAllDropdowns();
                return;
            }
            closeAllDropdowns();
            openDropdown(trigger, dropdown);
        }

        function openDropdown(trigger, dropdown) {
            document.body.appendChild(dropdown);
            var rect = trigger.getBoundingClientRect();
            var spaceBelow = window.innerHeight - rect.bottom;
            var dropHeight = Math.min(dropdown.scrollHeight, 250);
            dropdown.style.position = 'fixed';
            dropdown.style.display = 'block';
            dropdown.style.width = rect.width + 'px';
            dropdown.style.left = rect.left + 'px';
            dropdown.style.zIndex = '999999';
            if (spaceBelow < dropHeight + 10) {
                dropdown.style.bottom = (window.innerHeight - rect.top + 4) + 'px';
                dropdown.style.top = 'auto';
            } else {
                dropdown.style.top = (rect.bottom + 4) + 'px';
                dropdown.style.bottom = 'auto';
            }
            trigger.querySelector('svg').style.transform = 'rotate(180deg)';
            _activeDropdown = dropdown;
            _activeTrigger = trigger;
        }

        function closeAllDropdowns() {
            if (_activeDropdown) {
                _activeDropdown.style.display = 'none';
                if (_activeTrigger) _activeTrigger.querySelector('svg').style.transform = '';
                _activeDropdown = null;
                _activeTrigger = null;
            }
        }

        function selectService(value, el) {
            document.getElementById('serviceValue').value = value;
            document.getElementById('serviceTriggerText').textContent = value;
            var trigger = document.querySelector('#serviceSelect .custom-select-trigger');
            trigger.classList.add('selected');
            document.querySelectorAll('#serviceSelect .custom-select-option').forEach(function(opt) {
                opt.classList.remove('active');
            });
            el.classList.add('active');
            closeAllDropdowns();
        }

        document.addEventListener('click', function(e) {
            if (_activeTrigger && !_activeTrigger.contains(e.target) && _activeDropdown && !_activeDropdown.contains(e.target)) {
                closeAllDropdowns();
            }
        });
    </script>
</body>
</html>
