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
            max-height: 800px;
            position: relative;
            background: transparent;
            overflow: hidden;
            display: flex;
            align-items: flex-end;
        }

        .hero-fade-bottom {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 300px;
            background: linear-gradient(to bottom, transparent, #10022B);
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
            font-size: 72px;
            font-family: 'Involve', sans-serif;
            font-weight: 700;
            line-height: 80px;
            word-wrap: break-word;
            margin-bottom: 24px;
            opacity: 0;
            animation: fadeInUp 1s ease forwards;
        }

        .hero-subtitle {
            max-width: 600px;
            color: rgba(255, 255, 255, 0.60);
            font-size: 22px;
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
            width: 1400px;
            margin: 0 auto;
            padding: 100px 0;
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
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 30px;
            color: white;
        }

        .company-info-description {
            font-size: 24px;
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
        }

        /* Directions Section */
        .directions-section {
            width: 100%;
            padding: 150px 0;
            background: transparent;
        }

        .directions-container {
            width: 1400px;
            margin: 0 auto;
        }

        .directions-title {
            font-size: 72px;
            font-weight: 700;
            text-align: center;
            margin-bottom: 80px;
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
            text-decoration: none;
            display: block;
        }

        .direction-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(124, 58, 237, 0.5);
        }

        .direction-card-title {
            font-size: 36px;
            font-weight: 600;
            margin-bottom: 20px;
            color: white;
        }

        .direction-card-description {
            font-size: 18px;
            font-weight: 300;
            color: rgba(255, 255, 255, 0.6);
            line-height: 1.6;
        }

        /* Construction Stages Section */
        .construction-section {
            width: 100%;
            height: 100vh;
            background: transparent;
            position: relative;
            overflow: hidden;
        }

        .construction-container {
            width: 1400px;
            height: 100%;
            margin: 0 auto;
            padding: 0 148px;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }

        .construction-title {
            font-family: 'Involve', sans-serif;
            font-weight: 600;
            font-size: 64px;
            line-height: 80px;
            color: #F8F3FC;
            margin-bottom: 60px;
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
            align-items: center;
            gap: 80px;
        }

        .circular-progress {
            position: relative;
            width: 250px;
            height: 250px;
            flex-shrink: 0;
        }

        .circular-progress svg {
            transform: rotate(-90deg);
            width: 100%;
            height: 100%;
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
        }

        .construction-info {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
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
            padding: 150px 0;
            background: transparent;
            position: relative;
        }

        .projects-container {
            width: 1400px;
            margin: 0 auto;
        }

        .projects-title {
            font-family: 'Involve', sans-serif;
            font-weight: 600;
            font-size: 54px;
            line-height: 72px;
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
            padding: 160px 0 80px;
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
                width: 100%;
                font-size: 18px;
                line-height: 24px;
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
                max-width: 500px;
                padding: 0 20px;
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
                font-size: 14px;
                margin-bottom: 15px;
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
                width: 100%;
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
                font-size: 16px;
                line-height: 22px;
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
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    @include('components.header')
    
    <div class="page-container">
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="hero-gradient-1"></div>
            <div class="hero-gradient-2"></div>
            <div class="hero-fade-bottom"></div>
            
            <div class="hero-content">
                <h1 class="hero-title">Завод под ключ</h1>
                <p class="hero-subtitle">Пройдитесь по вашему будущему сооружению и прикоснитесь к каждой детали!</p>
                
                <div class="hero-buttons">
                    <a href="#contact" class="btn-primary">{{ __('messages.contact_us') }}</a>
                    <a href="#projects" class="btn-secondary">Наши проекты</a>
                </div>
            </div>
        </section>

        <!-- Company Info Section 1: Кто мы -->
        <section class="company-info-section" data-scroll-section>
            <div class="company-info-text">
                <h2 class="company-info-title">Кто мы</h2>
                <p class="company-info-description">
                    Daedalus — организация, специализирующаяся в области предоставления услуг для промышленных предприятий. Команда состоит из высококвалифицированных специалистов, обладающих глубокими знаниями и опытом в области горнодобывающей промышленности, технологических процессов и инженерии.
                </p>
            </div>
            <div class="company-info-image"></div>
        </section>

        <!-- Company Info Section 2: Статистика -->
        <section class="company-info-section reverse" data-scroll-section>
            <div class="company-info-text">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label">Лет опыта</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">&gt;20</div>
                        <div class="stat-label">Выполненных проектов</div>
                    </div>
                </div>
                <p class="company-info-description">
                    Мы успешно реализуем проекты любой сложности, предлагая современные решения в сфере проектирования и высокое качество выполнения работ.
                </p>
            </div>
            <div class="company-info-image"></div>
        </section>

        <!-- Company Info Section 3: Наша миссия -->
        <section class="company-info-section" data-scroll-section>
            <div class="company-info-text">
                <h2 class="company-info-title">Наша миссия</h2>
                <p class="company-info-description">
                    Обеспечивать безупречную эксплуатацию и максимальную рентабельность промышленных объектов. <strong>Мы применяем прогрессивные инженерные решения и стандарты качества, чтобы наши клиенты получали не просто сооружения, а высокотехнологичные активы,</strong> готовые к интеграции в глобальную цифровую экономику и устойчивые к вызовам завтрашнего дня.
                </p>
            </div>
            <div class="company-info-image"></div>
        </section>

        <!-- Directions Section -->
        <section class="directions-section">
            <div class="directions-container">
                <h2 class="directions-title">{{ __('messages.home.directions.title') }}</h2>
                
                <div class="directions-grid">
                    <a href="/automation" class="direction-card">
                        <h3 class="direction-card-title">{{ __('messages.home.direction.automation.title') }}</h3>
                        <p class="direction-card-description">
                            {{ __('messages.home.direction.automation.desc') }}
                        </p>
                    </a>

                    <a href="/design" class="direction-card">
                        <h3 class="direction-card-title">{{ __('messages.home.direction.design.title') }}</h3>
                        <p class="direction-card-description">
                            {{ __('messages.home.direction.design.desc') }}
                        </p>
                    </a>

                    <a href="/arvr" class="direction-card">
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
                <h2 class="construction-title">Этапы проектирования<br><span style="font-weight: 400;">проектно-инженерных работ</span></h2>
                <div style="display: flex; flex-direction: column; gap: 32px; margin-top: 50px;">

                    <div style="display: flex; align-items: center; gap: 30px;">
                        <svg width="80" height="80" viewBox="0 0 80 80" style="flex-shrink:0;">
                            <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(248,243,252,0.15)" stroke-width="6"/>
                            <circle cx="40" cy="40" r="34" fill="none" stroke="#7C3AED" stroke-width="6"
                                stroke-dasharray="213.6" stroke-dashoffset="181.6"
                                stroke-linecap="round" transform="rotate(-90 40 40)"/>
                            <text x="40" y="45" text-anchor="middle" fill="#F8F3FC" font-size="14" font-family="Involve,sans-serif" font-weight="600">15%</text>
                        </svg>
                        <span style="font-size: 20px; color: #F8F3FC; font-family: 'Involve', sans-serif; font-weight: 400;">ТЭО - ФЭМ</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 30px;">
                        <svg width="80" height="80" viewBox="0 0 80 80" style="flex-shrink:0;">
                            <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(248,243,252,0.15)" stroke-width="6"/>
                            <circle cx="40" cy="40" r="34" fill="none" stroke="#7C3AED" stroke-width="6"
                                stroke-dasharray="213.6" stroke-dashoffset="106.8"
                                stroke-linecap="round" transform="rotate(-90 40 40)"/>
                            <text x="40" y="45" text-anchor="middle" fill="#F8F3FC" font-size="14" font-family="Involve,sans-serif" font-weight="600">50%</text>
                        </svg>
                        <span style="font-size: 20px; color: #F8F3FC; font-family: 'Involve', sans-serif; font-weight: 400;">Цифровое ПРОЕКТИРОВАНИЕ BIM</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 30px;">
                        <svg width="80" height="80" viewBox="0 0 80 80" style="flex-shrink:0;">
                            <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(248,243,252,0.15)" stroke-width="6"/>
                            <circle cx="40" cy="40" r="34" fill="none" stroke="#7C3AED" stroke-width="6"
                                stroke-dasharray="213.6" stroke-dashoffset="42.7"
                                stroke-linecap="round" transform="rotate(-90 40 40)"/>
                            <text x="40" y="45" text-anchor="middle" fill="#F8F3FC" font-size="14" font-family="Involve,sans-serif" font-weight="600">80%</text>
                        </svg>
                        <span style="font-size: 20px; color: #F8F3FC; font-family: 'Involve', sans-serif; font-weight: 400;">Рабочий проект</span>
                    </div>

                    <div style="display: flex; align-items: center; gap: 30px;">
                        <svg width="80" height="80" viewBox="0 0 80 80" style="flex-shrink:0;">
                            <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(248,243,252,0.15)" stroke-width="6"/>
                            <circle cx="40" cy="40" r="34" fill="none" stroke="#7C3AED" stroke-width="6"
                                stroke-dasharray="213.6" stroke-dashoffset="0"
                                stroke-linecap="round" transform="rotate(-90 40 40)"/>
                            <text x="40" y="45" text-anchor="middle" fill="#F8F3FC" font-size="14" font-family="Involve,sans-serif" font-weight="600">100%</text>
                        </svg>
                        <span style="font-size: 20px; color: #F8F3FC; font-family: 'Involve', sans-serif; font-weight: 400;">Прохождение экспертизы</span>
                    </div>

                </div>
            </div>
        </section>

        <!-- Projects Section -->
        <section class="projects-section" id="projects">
            <div class="projects-container">
                <h2 class="projects-title">Наши проекты</h2>

                <div class="projects-carousel">
                    <div class="project-card">
                        <div class="project-bg"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">Caravan Resources Group</div>
                                <div class="project-overlay-description">Завод по производству катодной меди</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">RESOURCES CAPITAL GROUP</div>
                                <div class="project-overlay-description">Горно-обогатительный комбинат на месторождении Акмая в Карагандинской обл.</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">AK SU KMG</div>
                                <div class="project-overlay-description">Новый опреснительный завод на берегу Каспийского моря</div>
                            </div>
                        </div>
                    </div>

                    <div class="project-card">
                        <div class="project-bg"></div>
                        <div class="project-overlay">
                            <div class="project-info">
                                <div class="project-overlay-title">АО "MB Project Partners"</div>
                                <div class="project-overlay-description">Фиброцементный завод в г. Алматы</div>
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
                    <span class="projects-circle-label">Все проекты</span>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
            <div class="contact-container">
                <div class="contact-form-wrapper">
                    <h1 class="contact-main-title">Остались вопросы?</h1>
                    <p class="contact-subtitle">Наша команда готова ответить вам на любые вопросы, дать больше информации и помочь</p>
                    
                    <form class="contact-form" id="contactForm">
                        <input type="text" name="name" class="form-input" placeholder="Имя" required>
                        <input type="tel" name="phone" class="form-input" placeholder="Телефон" required>
                        <textarea name="message" class="form-textarea" placeholder="Сообщение" required></textarea>
                        <button type="button" onclick="submitFeedback()" class="form-submit">Оставить заявку</button>
                    </form>
                </div>
                
                <div class="contact-info-section">
                    <h2 class="contact-info-title">Наши контакты</h2>
                    
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
                        <a href="#" class="social-icon" aria-label="Twitter">
                            <svg viewBox="0 0 24 24">
                                <path d="M22 4s-.7 2.1-2 3.4c1.6 10-9.4 17.3-18 11.6 2.2.1 4.4-.6 6-2C3 15.5.5 9.6 3 5c2.2 2.6 5.6 4.1 9 4-.9-4.2 4-6.6 7-3.8 1.1 0 3-1.2 3-1.2z" fill="#F8F3FC"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon" aria-label="Telegram">
                            <svg viewBox="0 0 24 24">
                                <path d="M21 5L2 12.5l7 3.5l8.5-6.5l-5.5 8l9.5 4.5z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-icon" aria-label="YouTube">
                            <svg viewBox="0 0 24 24">
                                <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"/>
                                <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02" fill="#F8F3FC"/>
                            </svg>
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
            { percentage: 9, title: 'ТЭО - ФЭМ', description: 'Технико-экономическое обоснование и финансово-экономическая модель проекта. Анализ целесообразности и эффективности инвестиций', time: '1-30 дней' },
            { percentage: 18, title: 'Цифровое проектирование BIM', description: 'Создание информационной модели здания с использованием технологий BIM для оптимизации проектных решений и координации всех систем', time: '31-60 дней' },
            { percentage: 27, title: 'Рабочий проект', description: 'Разработка полного комплекта рабочей документации для строительства с детализацией всех конструктивных и технологических решений', time: '61-90 дней' },
            { percentage: 36, title: 'Прохождение экспертизы', description: 'Государственная экспертиза проектной документации и результатов инженерных изысканий для получения положительного заключения', time: '91-120 дней' },
            { percentage: 45, title: 'Мобилизация', description: 'Подготовка строительной площадки, организация временных сооружений, доставка техники и материалов, формирование рабочих бригад', time: '121-150 дней' },
            { percentage: 55, title: 'Земляные работы', description: 'Подготовка котлована, планировка территории, устройство фундаментов и подземных коммуникаций согласно проектной документации', time: '151-180 дней' },
            { percentage: 64, title: 'Монтаж бетонных и металлических конструкций', description: 'Возведение несущего каркаса здания из железобетонных и металлических элементов с соблюдением проектных параметров и норм безопасности', time: '181-210 дней' },
            { percentage: 73, title: 'Разводка инженерных сетей', description: 'Монтаж систем водоснабжения, канализации, отопления, вентиляции, электроснабжения и других инженерных коммуникаций', time: '211-240 дней' },
            { percentage: 82, title: 'Монтаж технологического оборудования', description: 'Установка и подключение специализированного оборудования, систем автоматизации и технологических линий согласно технологическому проекту', time: '241-270 дней' },
            { percentage: 91, title: 'Возведение несущих и ограждающих конструкций', description: 'Устройство стен, перекрытий, кровли, фасадных систем и других конструктивных элементов здания с применением современных материалов', time: '271-330 дней' },
            { percentage: 100, title: 'Пусконаладка', description: 'Комплексное тестирование и настройка всех инженерных систем и технологического оборудования, подготовка объекта к вводу в эксплуатацию', time: '331-365 дней' }
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
</body>
</html>
