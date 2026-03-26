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
        * {
            box-sizing: border-box;
        }

        html, body {
            overflow-x: hidden;
            width: 100%;
            margin: 0;
            padding: 0;
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
</head>
<body class="antialiased">
    
    @include('components.header')
    
    <main>
        @yield('content')
    </main>
    
    @if(!Request::is('contacts'))
        @include('components.footer')
    @endif
    
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
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
        
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
