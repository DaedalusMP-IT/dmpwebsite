<style>
    .footer-logo { height: 32px; width: auto; margin-bottom: 16px; }
    @media (max-width: 768px) { .footer-logo { height: 22px; } }

    .footer-contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        margin-bottom: 14px;
    }
    .footer-contact-icon {
        width: 24px;
        height: 24px;
        flex-shrink: 0;
        margin-top: 2px;
    }
    .footer-contact-text {
        font-size: 14px;
        line-height: 1.5;
        color: #F8F3FC;
    }
</style>
<footer style="background: #5a0a8c; color: #F8F3FC;" class="py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <img src="/public/logo_futter.png" alt="DAEDALUS" class="footer-logo">
            </div>

            <!-- Navigation -->
            <div>
                <h4 class="font-bold mb-4">Страницы</h4>
                <ul class="space-y-2 text-sm text-white">
                    <li><a href="{{ route('home') }}" class="hover:text-purple-400">Главная</a></li>
                    <li><a href="{{ route('projects') }}" class="hover:text-purple-400">Проекты</a></li>
                    <li><a href="{{ route('news') }}" class="hover:text-purple-400">Новости</a></li>
                    <li><a href="{{ route('vacancies') }}" class="hover:text-purple-400">Вакансии</a></li>
                    <li><a href="{{ route('contacts') }}" class="hover:text-purple-400">Контакты</a></li>
                </ul>
            </div>

            <!-- Services -->
            <div>
                <h4 class="font-bold mb-4">Услуги</h4>
                <ul class="space-y-2 text-sm text-white">
                    <li><a href="{{ route('design') }}" class="hover:text-purple-400">Проектирование</a></li>
                    <li><a href="{{ route('automation') }}" class="hover:text-purple-400">BIM Внедрение</a></li>
                    <li><a href="{{ route('arvr') }}" class="hover:text-purple-400">AR/VR обучение</a></li>
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h4 class="font-bold mb-4">Контакты</h4>

                <div class="footer-contact-item">
                    <img src="/public/phone-icon.png" alt="Phone" class="footer-contact-icon">
                    <a href="tel:+77766231177" class="footer-contact-text">8 (776) 623 11 77</a>
                </div>

                <div class="footer-contact-item">
                    <img src="/public/mail-icon.png" alt="Email" class="footer-contact-icon">
                    <a href="mailto:info@daedalus.kz" class="footer-contact-text">info@daedalus.kz</a>
                </div>

                <div class="footer-contact-item">
                    <img src="/public/map-icon.png" alt="Location" class="footer-contact-icon">
                    <a href="https://www.google.com/maps/place/43%C2%B012'48.8%22N+76%C2%B049'50.1%22E/@43.213543,76.829912,18z/data=!3m1!4b1!4m4!3m3!8m2!3d43.213543!4d76.830581?entry=ttu&g_ep=EgoyMDI2MDQwNy4wIKXMDSoASAFQAw%3D%3D" target="_blank" class="footer-contact-text">
                        г. Алматы, мкр. Достык,<br>ул. Фарида Шарипова, д. 134А
                    </a>
                </div>

                <div style="display: flex; gap: 15px; margin-top: 20px;">
                    <a href="https://www.instagram.com/daedalus.qaz/" target="_blank">
                        <img src="/public/instagram_icon.png" alt="Instagram" style="width: 24px; height: 24px; object-fit: contain;">
                    </a>
                    <a href="https://wa.me/77766231177" target="_blank">
                        <img src="/public/whatsapp_icon.png" alt="WhatsApp" style="width: 24px; height: 24px; object-fit: contain;">
                    </a>
                    <a href="https://t.me/makhambet_s" target="_blank">
                        <img src="/public/telegram_icon.png" alt="Telegram" style="width: 24px; height: 24px; object-fit: contain;">
                    </a>
                </div>
            </div>
        </div>

        <!-- Language Switcher -->
        <div class="flex justify-center space-x-4 mt-8 pt-8">
            <button class="text-sm hover:text-purple-400">EN</button>
            <button class="text-sm text-purple-400">РУС</button>
            <button class="text-sm hover:text-purple-400">ҚАЗ</button>
        </div>
    </div>
</footer>
