<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div>
                <h3 class="text-xl font-bold mb-4">DAEDALUS</h3>
                <p class="text-gray-400 text-sm">
                    Проектируем по вашим будущим сооружениям и производимых изделиям к каждой детали!
                </p>
            </div>
            
            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold mb-4">Главная</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('vacancies') }}" class="hover:text-purple-400">Открытые вакансии</a></li>
                    <li><a href="{{ route('news') }}" class="hover:text-purple-400">Новости</a></li>
                    <li><a href="{{ route('contacts') }}" class="hover:text-purple-400">Контакты</a></li>
                </ul>
            </div>
            
            <!-- Services -->
            <div>
                <h4 class="font-semibold mb-4">Услуги</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li><a href="{{ route('design') }}" class="hover:text-purple-400">Проектирование</a></li>
                    <li><a href="{{ route('automation') }}" class="hover:text-purple-400">Автоматизация</a></li>
                    <li><a href="{{ route('arvr') }}" class="hover:text-purple-400">AR/VR обучение</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="font-semibold mb-4">Контакты</h4>
                <ul class="space-y-2 text-sm text-gray-400">
                    <li>8 (776) 623 11 77</li>
                    <li>info@daedalus.kz</li>
                    <li>г. Алматы, мкр. Достык, ул. Фарида Шарипова, д. 134А</li>
                </ul>
                
                <!-- Social Icons -->
                <div class="flex space-x-3 mt-4">
                    <a href="#" class="hover:text-purple-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.894 8.221l-1.97 9.28c-.145.658-.537.818-1.084.508l-3-2.21-1.446 1.394c-.14.18-.357.295-.6.295-.002 0-.003 0-.005 0l.213-3.054 5.56-5.022c.24-.213-.054-.334-.373-.121l-6.869 4.326-2.96-.924c-.64-.203-.658-.64.135-.954l11.566-4.458c.538-.196 1.006.128.832.941z"/></svg>
                    </a>
                    <a href="#" class="hover:text-purple-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M7.8 2h8.4C19.4 2 22 4.6 22 7.8v8.4a5.8 5.8 0 0 1-5.8 5.8H7.8C4.6 22 2 19.4 2 16.2V7.8A5.8 5.8 0 0 1 7.8 2m-.2 2A3.6 3.6 0 0 0 4 7.6v8.8C4 18.39 5.61 20 7.6 20h8.8a3.6 3.6 0 0 0 3.6-3.6V7.6C20 5.61 18.39 4 16.4 4H7.6m9.65 1.5a1.25 1.25 0 0 1 1.25 1.25A1.25 1.25 0 0 1 17.25 8 1.25 1.25 0 0 1 16 6.75a1.25 1.25 0 0 1 1.25-1.25M12 7a5 5 0 0 1 5 5 5 5 0 0 1-5 5 5 5 0 0 1-5-5 5 5 0 0 1 5-5m0 2a3 3 0 0 0-3 3 3 3 0 0 0 3 3 3 3 0 0 0 3-3 3 3 0 0 0-3-3z"/></svg>
                    </a>
                    <a href="#" class="hover:text-purple-400">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Language Switcher Mobile -->
        <div class="flex justify-center space-x-4 mt-8 pt-8 border-t border-gray-800">
            <button class="text-sm hover:text-purple-400">EN</button>
            <button class="text-sm text-purple-400">РУС</button>
            <button class="text-sm hover:text-purple-400">ҚАЗ</button>
        </div>
    </div>
</footer>
