@extends('layouts.app')

@section('title', 'Проекты - DAEDALUS')

@push('styles')
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

    .projects-page {
        font-family: 'Involve', sans-serif;
        background: #10022B;
        min-height: 100vh;
        position: relative;
        overflow-x: hidden;
        padding: 120px 0 80px;
    }
    
    /* Декоративные световые эффекты */
    .glow-effect-1 {
        position: absolute;
        width: 389px;
        height: 437px;
        left: -60px;
        top: 1358px;
        background: #F8F3FC;
        filter: blur(350px);
        z-index: 0;
    }
    
    .glow-effect-2 {
        position: absolute;
        width: 389px;
        height: 437px;
        right: 0;
        top: 916px;
        background: #F8F3FC;
        filter: blur(350px);
        z-index: 0;
    }

    .projects-container {
        position: relative;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        z-index: 2;
    }

    .projects-title {
        font-weight: 700;
        font-size: 54px;
        line-height: 72px;
        color: #F8F3FC;
        text-align: center;
        margin-bottom: 80px;
    }

    .projects-list {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 40px;
        margin-bottom: 60px;
    }

    .project-card {
        position: relative;
        background: rgba(255, 255, 255, 0.05);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
    }

    .project-card:hover {
        transform: translateY(-10px);
        background: rgba(255, 255, 255, 0.08);
        border-color: rgba(124, 58, 237, 0.5);
        box-shadow: 0 20px 60px rgba(124, 58, 237, 0.3);
    }

    .project-images {
        width: 100%;
        height: 300px;
        position: relative;
        overflow: hidden;
        background: rgba(0, 0, 0, 0.2);
    }

    .project-images::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
        border-radius: 50%;
        filter: blur(80px);
    }

    .project-card:nth-child(1) .project-images::before {
        background: rgba(124, 58, 237, 0.6);
    }

    .project-card:nth-child(2) .project-images::before {
        background: rgba(168, 85, 247, 0.6);
    }

    .project-card:nth-child(3) .project-images::before {
        background: rgba(236, 72, 153, 0.6);
    }

    .project-card:nth-child(4) .project-images::before {
        background: rgba(59, 130, 246, 0.6);
    }

    .project-card:nth-child(5) .project-images::before {
        background: rgba(124, 58, 237, 0.6);
    }

    .project-info {
        padding: 30px;
        display: flex;
        flex-direction: column;
        gap: 15px;
        flex: 1;
    }

    .project-category {
        font-weight: 600;
        font-size: 14px;
        line-height: 18px;
        color: #7C3AED;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .project-name {
        font-weight: 700;
        font-size: 24px;
        line-height: 32px;
        color: #F8F3FC;
    }

    .project-description {
        font-weight: 400;
        font-size: 16px;
        line-height: 24px;
        color: rgba(248, 243, 252, 0.8);
        flex: 1;
    }

    .project-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }

    .project-detail {
        font-weight: 400;
        font-size: 14px;
        line-height: 20px;
        color: rgba(248, 243, 252, 0.7);
    }

    .project-detail strong {
        color: #F8F3FC;
        font-weight: 600;
    }

    @media (max-width: 968px) {
        .projects-container {
            padding: 40px 20px 80px;
        }

        .projects-list {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .projects-title {
            font-size: 32px;
            line-height: 40px;
        }

        .project-name {
            font-size: 18px;
            line-height: 24px;
        }

        .project-category {
            font-size: 12px;
        }

        .project-description {
            font-size: 13px;
            line-height: 20px;
        }

        .project-detail {
            font-size: 12px;
        }
    }

    @media (max-width: 480px) {
        .projects-title {
            font-size: 28px;
            line-height: 36px;
        }

        .project-info {
            padding: 20px;
        }

        .project-name {
            font-size: 16px;
            line-height: 22px;
        }

        .project-description {
            font-size: 12px;
            line-height: 18px;
        }
    }
    }
</style>
@endpush

@section('content')
<div class="projects-page">
    <div class="glow-effect-1"></div>
    <div class="glow-effect-2"></div>
    
    <div class="projects-container">
        <h1 class="projects-title">{{ __('messages.projects.title') }}</h1>
        
        <div class="projects-list">
             <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">"ГОРНОРУДНАЯ КОМПАНИЯ “САРЫ АРКА"</h3>
                    <p class="project-description">
                        • Строительство гидрометаллургического завода попроизводству сульфата никеля<br>
                        • Проектирование технологической схемы<br>
                        • Подбор оборудования<br>
                        • Выдача заданий на изыскания<br>
                        • Эскизный проект<br>
                        • Цифровое ПРОЕКТИРОВАНИЕ BIM<br>
                        • Рабочий проект<br>
                        • ОВОС<br>
                        • Смета<br>
                        • Прохождение государственной экспертизы<br>
                        • Получение разрешения на строительство
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">"AK SU KMG"</h3>
                    <p class="project-description">
                        • Строительство нового опреснительного завода на берегу, г. Жанаозен<br>
                        • Выдача заданий на изыскания<br>
                        • Эскизный проект<br>
                        • Расчет конструкции<br>
                        • Цифровое ПРОЕКТИРОВАНИЕ BIM<br>
                        • Рабочий проект<br>
                        • Смета<br>
                        • Прохождение государственной экспертизы<br>
                        • Получение разрешения на строительство
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">АО "MB Project Partners"</h3> 
                    <p class="project-description">
                        • Строительство Фиброцементного завода в г. Алматы<br>
                        • Выдача заданий на изыскания<br>
                        • Эскизный проект<br>
                        • Расчет конструкции<br>
                        • Цифровое ПРОЕКТИРОВАНИЕ BIM<br>
                        • Рабочий проект<br>
                        • Смета<br>
                        • Прохождение государственной экспертизы<br>
                        • Получение разрешения на строительство
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

             <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">TOO “CARAVAN RESOURCES GROUP”</h3> 
                    <p class="project-description">
                        • Строительство горно-перерабатывающего комплекса
                        Алмалы-2 по технологии кучного выщелачивания вторичных
                        руд производительностью до 30 тыс.тонн катодной меди в год
                        в Шетском районе Карагандинской области<br>
                        • Модернизация технологической схемы<br>
                        • Детальное проектирование BIM<br>
                        • Компоновка объектов и технологического оборудования<br>
                        • Разработка 3D чертежа<br>
                        • Прохождение государственной экспертизы с получениемположительного заключения<br>
                        • Смета
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">ТОО “РИДДЕР-ПОЛИМЕТАЛЛ“</h3> 
                    <p class="project-description">
                        • Выполнение работ по разработке технико-экономического обоснования (ТЭО)<br>
                        • Проект “Строительство обогатительной фабрики по переработке полиметаллической руды месторождения «Стрежанское»<br>
                        • Разработка технико-экономического обоснования и инвестиции в проект<br>
                        • DCF модель для проекта по строительству<br>
                        • Финансовая экономическая модель предприятия, вычисление CAPEX & OPEX<br>
                        • Разработка Эскизного проекта<br>
                        • Предварительная посадка завода в 3D Генплан на месторождений «Стрежанское»
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

             <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">ТОО “RESOURCES CAPITAL GROUP“</h3> 
                    <p class="project-description">
                        • Выполнение работ по разработке технико-экономического обоснования (ТЭО)<br>
                        • Финансово-экономическая модель проекта, оценка CAPEX / OPEX и эффективности<br>
                        • Горная, геологическая и гидрогеологическая части (параметры разработки месторождения, геологические и гидрогеологические условия)<br>
                        • Технологическая часть (технологические схемы добычи и переработки сырья)<br>
                        • Генеральный план, транспортная инфраструктура и инженерные сети<br>
                        • Автоматизация, КИПиА и системы управления<br>
                        • Экологическая оценка и природоохранные мероприятия<br>
                        • Организация строительства, календарное планирование и анализ рисков<br>
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">АО «АЛЮМИНИЙ КАЗАХСТАНА»</h3> 
                    <p class="project-description">
                        • Выполнение работ по адаптации проекта «Строительство участка продукционной фильтрации и вертикальных печей кальцинации на ПАЗ», г. Павлодар<br>
                        • Проектирование полной технологической схемы производства<br>
                        • Проектирование и реализация реконструкции существующих зданий и сооружений<br>
                        • Интеграция новой технологической системы в действующее производство<br>
                        • Выполнение инженерных расчетов пневматического транспорта готовой продукции (глинозёма)<br>
                        • Прохождение государственной экспертизы
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>

            <div class="project-card">
                <div class="project-images">
                    <div class="project-image-wrapper">
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                        <div class="project-image"></div>
                    </div>
                </div>
                <div class="project-info">
                    <p class="project-category">Промышленное строительство</p>
                    <h3 class="project-name">АО «ТРАНСНАЦИОНАЛЬНАЯ КОМПАНИЯ «КАЗХРОМ»</h3> 
                    <p class="project-description">
                        • Выполнение работ по адаптации проекта “Утилизационная электростанция ферросплавных газов 
                        плавильного цеха № 4 Актюбинского завода ферросплавов, Республики Казахстан” <br>
                        • Адаптация проектной документации Китайской инженерной корпорации «Тяньчэн» к требованиям нормативно-технической базы РК<br>
                        • Подготовка экспертного заключения о соответствии проектных решений действующим нормативам РК<br>
                        • Разработка, формирование и комплектация комплектов проектной и рабочей документации (альбомов)<br>
                        • Разработка и выпуск рабочей (строительной) документации<br>
                        • Сопровождение проекта при прохождении государственной экспертизы
                    </p>
                    <div class="project-details">
                        <div class="project-detail"><strong>Площадь:</strong> 50 000 м²</div>
                        <div class="project-detail"><strong>Срок реализации:</strong> 18 месяцев</div>
                        <div class="project-detail"><strong>Год:</strong> 2025</div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const projectCards = document.querySelectorAll('.project-card');
    
    projectCards.forEach((card, index) => {
        const wrapper = card.querySelector('.project-image-wrapper');
        const images = card.querySelectorAll('.project-image');
        let currentIndex = 0;
        
        setInterval(() => {
            currentIndex = (currentIndex + 1) % images.length;
            wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
        }, 3000);
    });
});
</script>
@endsection
