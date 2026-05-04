<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'DAEDALUS - Завод под ключ')</title>
    
    <!-- Tailwind CSS CDN (временно для разработки) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
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

        * {
            box-sizing: border-box;
            font-family: 'Involve', sans-serif;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Involve', sans-serif;
            font-size: 16px;
            background: #10022B;
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

        /* Custom styles */
        .btn-primary {
            background-color: #9333ea;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background-color: #7e22ce;
        }
    </style>
    
    @stack('styles')
    @yield('styles')
</head>
<body class="antialiased">
    
    @include('components.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('components.footer')
    
    <!-- Modal for success message -->
    <div id="thankYouModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-8 max-w-md mx-4">
            <div class="text-center">
                <h2 class="text-2xl font-bold mb-4">Спасибо!</h2>
                <p class="mb-6">Ваш запрос был успешно отправлен. Мы свяжемся с вами в ближайшее время.</p>
                <button onclick="closeModal()" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-lg">
                    OK
                </button>
            </div>
        </div>
    </div>
    
    <script>
        // Close modal function
        function closeModal() {
            document.getElementById('thankYouModal').classList.add('hidden');
        }
        
        // Close modal on outside click
        document.getElementById('thankYouModal')?.addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
