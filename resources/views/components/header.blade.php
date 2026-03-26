<header class="bg-gray-900 text-white">
    <nav class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold">
                    DAEDALUS
                </a>
            </div>
            
            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-purple-400 transition {{ request()->routeIs('home') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.home') }}
                </a>
                <a href="{{ route('design') }}" class="hover:text-purple-400 transition {{ request()->routeIs('design') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.design') }}
                </a>
                <a href="{{ route('automation') }}" class="hover:text-purple-400 transition {{ request()->routeIs('automation') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.automation') }}
                </a>
                <a href="{{ route('arvr') }}" class="hover:text-purple-400 transition {{ request()->routeIs('arvr') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.arvr') }}
                </a>
                <a href="{{ route('projects') }}" class="hover:text-purple-400 transition {{ request()->routeIs('projects') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.projects') }}
                </a>
                <a href="{{ route('services') }}" class="hover:text-purple-400 transition {{ request()->routeIs('services') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.licenses') }}
                </a>
                <a href="{{ route('vacancies') }}" class="hover:text-purple-400 transition {{ request()->routeIs('vacancies') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.vacancies') }}
                </a>
                <a href="{{ route('news') }}" class="hover:text-purple-400 transition {{ request()->routeIs('news') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.news') }}
                </a>
                <a href="{{ route('contacts') }}" class="hover:text-purple-400 transition {{ request()->routeIs('contacts') ? 'text-purple-400' : '' }}">
                    {{ __('messages.nav.contacts') }}
                </a>
            </div>
            
            <!-- Language Switcher -->
            <div class="hidden md:flex space-x-2">
                <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">EN</a>
                <a href="{{ route('language.switch', 'ru') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'ru' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">РУС</a>
                <a href="{{ route('language.switch', 'kk') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'kk' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">ҚАЗ</a>
            </div>
            
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-4 space-y-2">
            <a href="{{ route('home') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.home') }}</a>
            <a href="{{ route('design') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.design') }}</a>
            <a href="{{ route('automation') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.automation') }}</a>
            <a href="{{ route('arvr') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.arvr') }}</a>
            <a href="{{ route('projects') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.projects') }}</a>
            <a href="{{ route('services') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.licenses') }}</a>
            <a href="{{ route('vacancies') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.vacancies') }}</a>
            <a href="{{ route('news') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.news') }}</a>
            <a href="{{ route('contacts') }}" class="block py-2 hover:text-purple-400">{{ __('messages.nav.contacts') }}</a>
            
            <!-- Mobile Language Switcher -->
            <div class="flex space-x-2 pt-4">
                <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">EN</a>
                <a href="{{ route('language.switch', 'ru') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'ru' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">РУС</a>
                <a href="{{ route('language.switch', 'kk') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'kk' ? 'bg-purple-600' : 'hover:bg-gray-800' }}">ҚАЗ</a>
            </div>
        </div>
    </nav>
</header>
