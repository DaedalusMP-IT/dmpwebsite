<style>
    header {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 9999;
        background: rgba(129, 14, 199, 0.15);
        backdrop-filter: blur(16px);
        -webkit-backdrop-filter: blur(16px);
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    header nav a {
        font-family: 'Involve', sans-serif;
        font-size: 14px;
        font-weight: 600;
        color: #F8F3FC;
        text-decoration: none;
        transition: color 0.2s;
    }

    header nav a:hover {
        color: #c084fc;
    }

    #mobile-menu {
        background: rgba(16, 2, 43, 0.95);
        backdrop-filter: blur(16px);
        padding: 16px;
        border-radius: 12px;
        margin-top: 8px;
    }
</style>

<header>
    <nav class="container mx-auto px-4 py-3">
        <div class="flex items-center justify-between">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ route('home') }}">
                    <img src="/public/logo.png" alt="DAEDALUS" style="height: 24px; width: auto;">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-purple-400' : '' }}">{{ __('messages.nav.home') }}</a>
                <a href="{{ route('design') }}" class="{{ request()->routeIs('design') ? 'text-purple-400' : '' }}">{{ __('messages.nav.design') }}</a>
                <a href="{{ route('automation') }}" class="{{ request()->routeIs('automation') ? 'text-purple-400' : '' }}">{{ __('messages.nav.automation') }}</a>
                <a href="{{ route('arvr') }}" class="{{ request()->routeIs('arvr') ? 'text-purple-400' : '' }}">{{ __('messages.nav.arvr') }}</a>
                <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'text-purple-400' : '' }}">{{ __('messages.nav.projects') }}</a>
                <a href="{{ route('vacancies') }}" class="{{ request()->routeIs('vacancies') ? 'text-purple-400' : '' }}">{{ __('messages.nav.vacancies') }}</a>
                <a href="{{ route('news') }}" class="{{ request()->routeIs('news') ? 'text-purple-400' : '' }}">{{ __('messages.nav.news') }}</a>
                <a href="{{ route('contacts') }}" class="{{ request()->routeIs('contacts') ? 'text-purple-400' : '' }}">{{ __('messages.nav.contacts') }}</a>
            </div>

            <!-- Language Switcher -->
            <div class="hidden md:flex space-x-2">
                <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600' : '' }}">EN</a>
                <a href="{{ route('language.switch', 'ru') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'ru' ? 'bg-purple-600' : '' }}">РУС</a>
                <a href="{{ route('language.switch', 'kk') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'kk' ? 'bg-purple-600' : '' }}">ҚАЗ</a>
            </div>

            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden" style="color: #F8F3FC;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-2">
            <a href="{{ route('home') }}" class="block py-2">{{ __('messages.nav.home') }}</a>
            <a href="{{ route('design') }}" class="block py-2">{{ __('messages.nav.design') }}</a>
            <a href="{{ route('automation') }}" class="block py-2">{{ __('messages.nav.automation') }}</a>
            <a href="{{ route('arvr') }}" class="block py-2">{{ __('messages.nav.arvr') }}</a>
            <a href="{{ route('projects') }}" class="block py-2">{{ __('messages.nav.projects') }}</a>
            <a href="{{ route('vacancies') }}" class="block py-2">{{ __('messages.nav.vacancies') }}</a>
            <a href="{{ route('news') }}" class="block py-2">{{ __('messages.nav.news') }}</a>
            <a href="{{ route('contacts') }}" class="block py-2">{{ __('messages.nav.contacts') }}</a>

            <div class="flex space-x-2 pt-4">
                <a href="{{ route('language.switch', 'en') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'en' ? 'bg-purple-600' : '' }}">EN</a>
                <a href="{{ route('language.switch', 'ru') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'ru' ? 'bg-purple-600' : '' }}">РУС</a>
                <a href="{{ route('language.switch', 'kk') }}" class="px-3 py-1 rounded {{ app()->getLocale() == 'kk' ? 'bg-purple-600' : '' }}">ҚАЗ</a>
            </div>
        </div>
    </nav>
</header>
