@extends('frontend.layouts.main')
@section('title', 'Маркетинговая Ассоциация Узбекистана')
@section('description', 'Маркетинговая Ассоциация Узбекистана. Цель Ассоциации: объединение юридических лиц и экспертов, заинтересованных в развитии маркетинга в Узбекистане, представление профессиональных интересов, совершенствование профессиональных норм и развитие кадрового потенциала маркетинговой отрасли.')
@section('content')
    <main class="main">
        <section class="section-box">
            <div class="banner-hero hero-5">
                <div class="banner-image-main">
                    <div class="img-bg mt-0"></div>
                    <div class="blur-bg blur-move"></div>
                </div>
                <div class="banner-inner-top">
                    <div class="container">
                        <div class="box-banner-left">
                            <a class="btn btn-brand-5-new" href="javascript:void(0);"><span>Новый</span> Версия 1.2
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewbox="0 0 22 22" fill="none">
                                    <path d="M22 11.0003L18.4791 7.47949V10.3074H0V11.6933H18.4791V14.5213L22 11.0003Z" fill=""></path>
                                </svg>
                            </a>
                        </div>
                        <div class="box-banner-left">
                            <h2 class="display-4 mb-30 mt-25 neutral-0">Найдите идеального поставщика услуг</h2>
                            <p class="text-lg neutral-500 mb-55">
                                Добро пожаловать в крупнейшее бизнес-сообщество Центральной Азии! Мы объединяем тех, кто развивает бизнес в Узбекистане с помощью маркетинга.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        <section class="section-box wow animate__animated animate__fadeIn box-how-it-work">
            <div class="container">
                <h2 class="mt-35 mb-15 text-center">Легко и быстро найдите<br class="d-none d-lg-block"> надежных поставщиков услуг</h2>
                <p class="text-lg neutral-500 mb-45 text-center">Найдите профессионалов, которые идеально подойдут для вашего бизнеса. Маркетинг, IT, дизайн и многое <br/> другое – все лучшие услуги на одной платформе. Достигайте своих целей с нами!</p>
               <div class="row">
                    @if ($categories->isNotEmpty())
                        @foreach($categories as $category)
                            <div class="col-lg-4">
                                <div class="box-border-rounded">
                                    <div class="card-casestudy">
                                        <div class="card-title mb-30">
                                            <h6 style="font-size: 20px">
                                                <span class="number text-white">{{ $loop->iteration }}</span>
                                                {{ $category->name_ru }}
                                            </h6>
                                        </div>
                                        <div class="card-desc">
                                            @if ($category->subCategories->isNotEmpty())
                                                @foreach ($category->subCategories as $service)
                                                    <a href="{{ route('services-providers', [$service->id, $category->id]) }}">
                                                        {{-- {{ route('services-providers', [$service->id, $category->id]) }} --}}
                                                        <span>{{ $service->name_ru }} </span><i class="fa-solid fa-arrow-right"></i>
                                                    </a>
                                                @endforeach
                                            @else
                                                <p>Поставщики услуг отсутствуют</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>Поставщики услуг отсутствуют</p>
                    @endif
                </div>

            </div>
            <div class="container mt-25">
                <div class="box-newsletter mb-0" style="background-image: url('https://marketing.uz/uploads/sections/846/original.jpg'); background-size: cover; height: 347px;">
                </div>
            </div>
        </section>

        <section class="section-box wow animate__animated animate__fadeIn box-awards" 
            style="background-color: #191919; background-image: none;">
            <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-40">
                <div class="box-number-award text-white">
                    <p class="display-2">+<span class="count">250</span></p>
                    <h3 class="heading-3">Наград</h3>
                </div>
                <h1 class="heading-1 neutral-0">Доверие более 80,000 компаний</h1>
                </div>
                <div class="col-lg-7 mb-40">
                <div class="box-sliders-award">
                    <div class="box-sliders-award-inner"></div>
                    <div class="box-sliders-award-bottom">
                    <div class="list-slider-award">
                        <div class="slider-award-1">
                        <div class="carouselTicker3 carouselTicker_vertical" id="slide-top-award">
                            <ul class="carouselTicker__list">
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/glossy.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/ipsum.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/leafe.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/minty.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/minty.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            </ul>
                        </div>
                        </div>
                        <div class="slider-award-2">
                        <div class="carouselTicker4 carouselTicker_vertical" id="slide-bottom-award">
                            <ul class="carouselTicker__list">
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/glossy.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/ipsum.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/leafe.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/sitemark.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/sitemark.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            </ul>
                        </div>
                        </div>
                        <div class="slider-award-3">
                        <div class="carouselTicker5 carouselTicker_vertical" id="slide-top-award-2">
                            <ul class="carouselTicker__list">
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/glossy.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/minty.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/ipsum.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/leafe.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/leafe.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/pinpoint.png" alt="Nivia"></div>
                            </li>
                            <li class="carouselTicker__item">
                                <div class="item-logo-2"><img src="assets/imgs/page/homepage6/leafe.png" alt="Nivia"></div>
                            </li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-preparing-3 py-5">
            <div class="container">
                <div class="text-center">
                    <h2 class="neutral-0 mb-20">Почему нас выбирают наши клиенты?</h2>
                    <p class="text-lg neutral-700">Крупнейшая маркетинговая платформа в <br/> Узбекистане – надежный источник эффективных решений.</p>
                </div>
                <div class="row mt-90">
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#!">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EmojiObjectsTwoToneIcon" style="font-size:2.5rem">
                                    <path d="M10 18h4v1h-4zm0-2h4v1h-4z" opacity=".3"></path>
                                    <path d="M12 3c-.46 0-.93.04-1.4.14-2.76.53-4.96 2.76-5.48 5.52-.48 2.61.48 5.01 2.22 6.56.43.38.66.91.66 1.47V19c0 1.1.9 2 2 2h.28c.35.6.98 1 1.72 1s1.38-.4 1.72-1H14c1.1 0 2-.9 2-2v-2.31c0-.55.22-1.09.64-1.46C18.09 13.95 19 12.08 19 10c0-3.87-3.13-7-7-7zm2 16h-4v-1h4v1zm0-2h-4v-1h4v1zm1.31-3.26c-.09.08-.16.18-.24.26H8.92c-.08-.09-.15-.19-.24-.27-1.32-1.18-1.91-2.94-1.59-4.7.36-1.94 1.96-3.55 3.89-3.93.34-.07.68-.1 1.02-.1 2.76 0 5 2.24 5 5 0 1.43-.61 2.79-1.69 3.74z"></path>
                                    <path d="M11.5 11h1v3h-1z"></path>
                                    <path d="m9.6724 9.5808.7071-.7071 2.1214 2.1213-.7071.7071z"></path>
                                    <path d="m12.2081 11.7124-.707-.7071 2.1212-2.1214.7071.7072z"></path>
                                </svg></a>
                            <div class="card-info"><a href="#!">
                                    <h5 class="text-22-bold">Современные данные и технологии AI</h5></a>
                                <p class="text-md neutral-700">Наши обширные и точные данные о рынке помогают принимать правильные решения. Найдите подходящего поставщика услуг, чтобы продвинуть свой бизнес.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#!">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="HandshakeTwoToneIcon" style="font-size:2.5rem"><path d="M12.22 19.85c-.18.18-.5.21-.71 0-.18-.18-.21-.5 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.19.2-.51.19-.71 0-.21-.21-.18-.53 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.19-.19-.51 0-.71l3.39-3.39-1.42-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.2-.19-.51 0-.71L9.52 8.4l1.87 1.86c.95.95 2.59.94 3.54 0 .98-.98.98-2.56 0-3.54l-1.86-1.86.28-.28c.78-.78 2.05-.78 2.83 0l4.24 4.24c.78.78.78 2.05 0 2.83l-8.2 8.2z" opacity=".3"></path><path d="M12.22 19.85c-.18.18-.5.21-.71 0-.18-.18-.21-.5 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.19.2-.51.19-.71 0-.21-.21-.18-.53 0-.71l3.39-3.39-1.41-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.19-.19-.51 0-.71l3.39-3.39-1.42-1.41-3.39 3.39c-.18.18-.5.21-.71 0-.19-.2-.19-.51 0-.71L9.52 8.4l1.87 1.86c.95.95 2.59.94 3.54 0 .98-.98.98-2.56 0-3.54l-1.86-1.86.28-.28c.78-.78 2.05-.78 2.83 0l4.24 4.24c.78.78.78 2.05 0 2.83l-8.2 8.2zm9.61-6.78c1.56-1.56 1.56-4.09 0-5.66l-4.24-4.24c-1.56-1.56-4.09-1.56-5.66 0l-.28.28-.28-.28c-1.56-1.56-4.09-1.56-5.66 0L2.17 6.71C.75 8.13.62 10.34 1.77 11.9l1.45-1.45c-.39-.75-.26-1.7.37-2.33l3.54-3.54c.78-.78 2.05-.78 2.83 0l3.56 3.56c.18.18.21.5 0 .71-.21.21-.53.18-.71 0L9.52 5.57l-5.8 5.79c-.98.97-.98 2.56 0 3.54.39.39.89.63 1.42.7.07.52.3 1.02.7 1.42.4.4.9.63 1.42.7.07.52.3 1.02.7 1.42.4.4.9.63 1.42.7.07.54.31 1.03.7 1.42.47.47 1.1.73 1.77.73.67 0 1.3-.26 1.77-.73l8.21-8.19z"></path></svg></a>
                            <div class="card-info"><a href="#!">
                                    <h5 class="text-22-bold">Доказанная эффективность</h5></a>
                                <p class="text-md neutral-700">
                                    Ежедневно тысячи бизнесов в Узбекистане достигают новых успехов с помощью наших поставщиков услуг. Простота и эффективность нашего процесса – ключ к вашему росту.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#!">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="BoltTwoToneIcon" style="font-size:2.5rem"><path d="M11 21h-1l1-7H7.5c-.88 0-.33-.75-.31-.78C8.48 10.94 10.42 7.54 13.01 3h1l-1 7h3.51c.4 0 .62.19.4.66C12.97 17.55 11 21 11 21z"></path></svg></a>
                            <div class="card-info">
                                <a href="#!">
                                    <h5 class="text-22-bold">Простой, быстрый и гибкий процесс</h5>
                                </a>
                                <p class="text-md neutral-700">
                                    Мы помогаем вам за несколько минут найти поставщиков, соответствующих вашим потребностям и критериям. Это легко и удобно.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="card-preparing-2"><a class="card-image" href="#!">
                                <svg class="MuiSvgIcon-root MuiSvgIcon-fontSizeMedium text-client-500 bg-client-200 p-8 rounded-lg css-vubbuv" focusable="false" aria-hidden="true" viewBox="0 0 24 24" data-testid="EmojiPeopleTwoToneIcon" style="font-size:40px"><circle cx="12" cy="4" r="2"></circle><path d="M15.89 8.11C15.5 7.72 14.83 7 13.53 7h-2.54C8.24 6.99 6 4.75 6 2H4c0 3.16 2.11 5.84 5 6.71V22h2v-6h2v6h2V10.05L18.95 14l1.41-1.41-4.47-4.48z"></path></svg>
                            </a>
                            <div class="card-info"><a href="#!">
                                    <h5 class="text-22-bold">Человеческий подход</h5></a>
                                <p class="text-md neutral-700">Опытные специалисты Ассоциации Маркетинга Узбекистана всегда готовы помочь вам на каждом этапе. Мы объединяем возможности современных технологий с теплотой человеческого взаимодействия.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-our-track box-our-track-3">
            <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center mb-40"><img src="assets/imgs/dora/provider-section.webp" alt="DORA"></div>
                <div class="col-lg-6 mb-40">
                <div class="box-padding-left-50">
                    <h2 class="heading-2 mb-20">Поставщики услуг</h2>
                    <p class="text-lg neutral-700">
                        Наша платформа – это лучшее место для продвижения ваших услуг! 
                        <br><br>
                        Мы связываем вас с подходящими клиентами и помогаем донести ваши услуги до широкой аудитории. С нашей платформой вы достигаете быстрых и эффективных результатов.
                    </p>
                    <div class="row mt-50">
                    <div class="col-lg-6 col-sm-6">
                        <div class="card-feature-2">
                        <div class="card-image"><img src="assets/imgs/page/homepage3/marketing.svg" alt="DORA"></div>
                        <div class="card-info"><a href="#">
                            <h3 class="text-16-bold">Широкая аудитория</h3></a>
                            <p class="text-md neutral-700">Продвигайте свои услуги для новых клиентов</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card-feature-2">
                        <div class="card-image"><img src="assets/imgs/page/homepage3/digital.svg"></div>
                        <div class="card-info"><a href="#">
                            <h3 class="text-16-bold">Анализ и отслеживание</h3></a>
                            <p class="text-md neutral-700">Получайте полезные данные для оценки вашей эффективности</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="card-feature-2">
                        <div class="card-image"><img src="assets/imgs/page/homepage3/product.svg"></div>
                        <div class="card-info"><a href="#">
                            <h3 class="text-16-bold">Рост сотрудничества</h3></a>
                            <p class="text-md neutral-700">Откройте новые возможности для развития через нашу платформу</p>
                        </div>
                        </div>
                    </div>
                    
                    </div>
                </div>
                </div>
            </div>
            </div>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-case-study-2 box-client-2">
            <div class="container">
            <div class="row">
                <div class="col-lg-5">
                <div class="box-info-casestudy">
                    <h3 class="mb-40">Мы предлагаем простые и эффективные <br> решения для наших клиентов</h3>
                    <div class="row">
                    <div class="col-lg-12">
                        <div class="card-casestudy">
                        <div class="card-title">
                            <h6><span class="number text-white">1</span>Анализ потребностей</h6>
                        </div>
                        <div class="card-desc">
                            <p>Мы тщательно изучаем ваши запросы и цели, чтобы предложить подходящие решения. Это помогает определить оптимальные стратегии для достижения вашего успеха.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card-casestudy">
                        <div class="card-title">
                            <h6><span class="number text-white">2</span>Индивидуальный подход</h6>
                        </div>
                        <div class="card-desc">
                            <p>Мы разрабатываем уникальные стратегии и инструменты, которые соответствуют вашим требованиям. Каждый клиент для нас особенный.</p>
                        </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card-casestudy">
                        <div class="card-title">
                            <h6><span class="number text-white">3</span>Анализ данных</h6>
                        </div>
                        <div class="card-desc">
                            <p>Мы помогаем вам извлечь максимум из собранных данных, создавая эффективные отчёты и визуализацию для принятия обоснованных решений.</p>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                <div class="col-lg-7 text-center"><img src="assets/imgs/dora/partner-section.webp" alt="DORA"></div>
            </div>
            </div>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-discover" style="background-color: #e7f4ee">
            <div class="container">
                <div class="row align-items-center">
                    <div class="row align-items-center texts my-5">
                        <div class="col-lg-6">
                            <h3 class="mb-4">Присоединяйтесь уже сегодня и выведите свой бизнес на новый уровень</h3>
                            <p class="text-lg neutral-500">
                                Каждый месяц тысячи пользователей успешно находят, сравнивают и выбирают поставщиков услуг через нашу платформу. 
                                Станьте одним из них и начните развивать свой бизнес прямо сейчас!
                            </p>
                            <div class="box-buttons-feature-4" style="margin-bottom: 24px; justify-content: start;">
                                <a class="btn btn-learmore-2" href="{{ route('login') }}">
                                    <span>
                                        <svg width="39" height="38" viewbox="0 0 39 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="0.5" width="38" height="38" rx="19" fill="#191919"></rect>
                                            <g clip-path="url(#clip0_1_376)">
                                                <path d="M24.1537 16.8139L15.218 25.7497L13.75 24.2817L22.6847 15.3459H14.81V13.2695H26.2301V24.6897H24.1537V16.8139Z" fill="#ffffff"></path>
                                            </g>
                                            <defs>
                                                <clippath id="clip0_1_376">
                                                <rect width="13" height="13" fill="white" transform="translate(13.5 13)"></rect>
                                                </clippath>
                                            </defs>
                                            </svg>
                                    </span>
                                    Начать сейчас
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-image-neutral-1000">
                                <img src="https://tafreklama-2024.marketing.uz/uploads/taf24/4a8b74972aeb.jpg" alt="marketing" style="width: 100%;height: 100%;border-radius: 20px; object-fit: cover;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
