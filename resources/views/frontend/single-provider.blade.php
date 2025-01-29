@extends('frontend.layouts.main')

@section('title', 'Page Title')
@section('description', 'Page description')


@section('content')
    <style>
        .more-text {
            display: none;
        }

        .show-more-button {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
        }
    </style>

    <main class="main">

        <section class="section-box">
            <div class="box-head-single box-head-single-candidate">
                <div class="container">
                    <div class="heading-image-rd online">
                        <a href="#">
                            <figure><img alt="jobhub" src="{{ asset('storage/' . $provider->companies->first()->logo) }}">
                            </figure>
                        </a>
                    </div>

                    <div class="heading-main-info">
                        <h4>{{ $provider->companies->first()->name }}</h4>
                        <div class="head-info-profile">

                            <span class="text-small mr-20"><i
                                    class="fi-rr-marker text-mutted"></i>{{ $provider->companies->first()->address }}</span>
                            <span class="text-small"><i class="fi-rr-clock text-mutted"></i> Since
                                {{ \Carbon\Carbon::parse($provider->companies->first()->created_at)->format('Y') }}</span>

                            <div class="row align-items-end">
                                <div class="col-lg-6 mt-3">
                                    @foreach ($services as $service)
                                        <a href="#"
                                            class="btn btn-tags-sm mb-10 mr-5">{{ $service->subCategory->name_ru ?? null }}</a>
                                    @endforeach

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-box">
            <div class="container">
                <div class="row" style="display:flex;">

                    <div class="col-sm-12 col-lg-8">

                        <div class="links-box"
                            style="display: flex; border-bottom: 1px solid #D1D3D4; margin: 0 auto 40px; justify-content: start;">
                            <div class="link" style="border-right: 1px solid  #D1D3D4; padding:10px 28px; color: black;">
                                <a href="#1" style="display: flex; align-items: center;"><i class="fa-regular fa-file"
                                        style="margin-right: 7px;"></i> <br><span style="white-space: nowrap;">О
                                        компании</span></a>
                            </div>
                            <div class="link" style="border-right: 1px solid  #D1D3D4; padding: 10px 28px; color: black;">
                                <a href="#services" style="display: flex; align-items: center;"><i
                                        class="fa-solid fa-paintbrush" style="margin-right: 7px;"></i>Услуги</a>
                            </div>
                            <div class="link" style="border-right: 1px solid  #D1D3D4; padding: 10px 28px; color: black;">
                                <a href="#portfolio" style="display: flex; align-items: center;"><i
                                        class="fa-regular fa-images" style="margin-right: 7px;"></i>Портфолио</a>
                            </div>
                            <div class="link" style="border-right: 1px solid  #D1D3D4; padding: 10px 28px; color: black;">
                                <a href="#awards" style="display: flex; align-items: center;"><i class="fa-solid fa-award"
                                        style="margin-right: 7px;"></i>Награды</a>
                            </div>
                            <div class="link" style="border-right: 1px solid  #D1D3D4; padding: 10px 28px; color: black;">
                                <a href="#reviews" style="display: flex; align-items: center;"><i class="fa-regular fa-star"
                                        style="margin-right: 7px;"></i>Отзывы</a>
                            </div>
                            <div class="link" style="padding: 10px 28px;">
                                <a href="#contact" style="display: flex; align-items: center;">
                                    <i class="fa-regular fa-envelope" style="margin-right: 7px;"></i>Контакты
                                </a>
                            </div>
                        </div>

                        <section id="1">

                            <div class="content-single">
                                <h4 class="mb-20">О компании</h4>
                                <p style="margin-bottom: 40px;">
                                    {{ $provider->companies->first()->description }}
                                </p>
                            </div>

                        </section>

                        <section id="services" class="services-section">
                            <div class="box-faqs-inner-4">
                                <h2 class="title" style="font-size: 30px; margin-bottom: 15px;">Услуги</h2>

                                <div class="accordion accordion-flush accordion-style-2" id="accordionFAQS"
                                     style="border: 1px solid #D1D3D4; border-radius: 16px">

                                    @foreach ($services as $index => $service)
                                        <div class="accordion-item">

                                            <h2 class="accordion-header" id="flush-heading-{{ $index }}">
                                                <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#flush-collapse-{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                                        aria-controls="flush-collapse-{{ $index }}"
                                                        style="display:flex; justify-content: space-between;">
                                                    {{ $service->subCategory->name_ru ?? null }}
                                                    <div style="display: flex; align-items: center;">
                                                        <p class="d-none d-md-block "
                                                           style="padding: 0 19px; font-size: 14px;">0 работа</p>
                                                        <div class="card-rates d-none d-md-block border-start border-end "
                                                             style="border-left:1px solid #D1D3D4; border-right: 1px solid #D1D3D4; padding: 0 20px;">
                                                            <img src="/assets/imgs/template/icons/star.svg" alt="Nivia" />
                                                            <img src="/assets/imgs/template/icons/star.svg" alt="Nivia" />
                                                            <img src="/assets/imgs/template/icons/star.svg" alt="Nivia" />
                                                            <img src="/assets/imgs/template/icons/star.svg" alt="Nivia" />
                                                            <img src="/assets/imgs/template/icons/star.svg" alt="Nivia" />
                                                        </div>
                                                        <p style="padding: 0 19px; font-size: 14px;">{{ $service->price }} UZS</p>
                                                    </div>
                                                </button>
                                            </h2>

                                            <div id="flush-collapse-{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                                 aria-labelledby="flush-heading-{{ $index }}" data-bs-parent="#accordionFAQS">
                                                <div class="accordion-body">

                                                    <h6 style="margin-bottom: 15px;">Описание</h6>
                                                    <div class="truncate-text" id="text-content-full-5">
                                                        <p>{{ $service->description }}</p>
                                                    </div>

                                                    <button data-target="text-content-full-5" class="show-more-button"
                                                            style="border: none; background-color: transparent; padding: 0;">
                                                        увидеть больше
                                                    </button>

                                                    <div class="skills-box" style="margin-top: 25px;">
                                                        <h6 style="margin-bottom: 15px;">Навыки</h6>
                                                        <div class="box-tags-sidebar">
                                                            <p class="btn btn-neutral-100">Разработка логотипов</p>
                                                            <p class="btn btn-neutral-100">Создание брендбуков</p>
                                                            <p class="btn btn-neutral-100">Графический дизайн</p>
                                                            <p class="btn btn-neutral-100">Цветовая идентичность бренда</p>
                                                            <p class="btn btn-neutral-100">Типографика</p>
                                                        </div>
                                                    </div>

                                                    <div class="reviews-box" style="margin-top: 25px;">
                                                        <h6 style="margin-bottom: 15px; padding: 5px;">Отзывы</h6>

                                                        <div class="card-testimonial col-lg-4">
                                                            <div class="card-rates">
                                                                <img src="/assets/imgs/template/icons/star.svg" alt="Star">
                                                                <img src="/assets/imgs/template/icons/star.svg" alt="Star">
                                                                <img src="/assets/imgs/template/icons/star.svg" alt="Star">
                                                                <img src="/assets/imgs/template/icons/star.svg" alt="Star">
                                                                <img src="/assets/imgs/template/icons/star.svg" alt="Star">
                                                            </div>
                                                            <div class="card-author">
                                                                <div class="author-info">
                                        <span class="text-md author-name mr-10"
                                              style="margin-top: 10px !important;">Davron</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>
                        </section>

                    </div>

                    <div class="col-sm-12 col-lg-4">
                        <div class="col-12 px-lg-15 mt-lg-30">

                            <div class="order-lg-first" style="margin-top: 15px;">
                                <div class="sidebar">

                                    <div class="box-sidebar-rounded">

                                        <div class="sidebar-content">
                                            <div class="item-line">
                                                <div class="text-date-post text-16-bold">
                                                    {{ $provider->companies->first()->number_of_team }} люди
                                                </div>
                                                <p class="text-date-post-value text-md neutral-500">в их команде</p>
                                            </div>
                                            <div class="item-line">
                                                <div class="text-date-expire text-16-bold">4 проекты</div>
                                                <p class="text-date-post-value text-md neutral-500">в их портфолио
                                                </p>
                                            </div>
                                            <div class="item-line">
                                                <div class="text-salary text-16-bold">{{ $awards->count() }} награда</div>
                                                <p class="text-date-post-value text-md neutral-500">присуждено</p>
                                            </div>
                                            <div class="item-line">
                                                <div class="text-location text-16-bold">Номер телефона:</div>
                                                <p class="text-date-post-value text-md neutral-500">
                                                    {{ $provider->companies->first()->phone_number }}</p>
                                            </div>

                                            <div class="item-line">
                                                <div class="text-date-lang text-16-bold">Языки</div>
                                                <p class="text-date-post-value text-md neutral-500">
                                                    {{ $provider->language->name_ru }}</p>
                                            </div>

                                            <div class="item-line">
                                                <div class="text-date-founded text-16-bold">Основана в </div>
                                                <p class="text-date-post-value text-md neutral-500">
                                                    {{ $provider->companies->first()->founded }}</p>
                                            </div>

                                            <div class="box-button-sidebar"><a class="btn btn-black btn-rounded"
                                                    style="color: #fff !important;"
                                                    href="{{ $provider->companies->first()->website }}"
                                                    target="_blank">Открыть веб-сайт
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="8"
                                                        viewbox="0 0 22 8" fill="none">
                                                        <path
                                                            d="M22 4.00032L18.4791 0.479492V3.3074H0V4.69333H18.4791V7.52129L22 4.00032Z"
                                                            fill="#ffffff">
                                                        </path>
                                                    </svg>
                                                </a>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-12">

                        <section id="portfolio" class="portfolios section" style="margin: 30px 0;">

                            <div class="box-list-news" style=" cursor: default;">
                                <h2 class="title" style="font-size: 30px; padding: 5px;">Портфолио</h2>
                                <div class="row portfolio-padding">

                                    @foreach ($portfolios as $index => $portfolio)
                                        <div class="col-lg-3 col-md-6" style="cursor: pointer;">
                                            <div class="h-100 card-grid-2 card-employers wow animate__animated animate__fadeIn"
                                                 onclick="openModal({{ $index }})">
                                                <div class="text-center card-grid-2-image-rd online">
                                                    <img style="object-fit: cover" height="222px" class="w-100 rounded"
                                                         alt="jobhub"
                                                         src="{{ asset('storage/' . $portfolio->image) }}" />
                                                </div>
                                                <div class="card-block-info">
                                                    <div class="card-profile">
                                                        <h5>
                                                            <a href="#!"><strong>{{ $portfolio->work_title }}</strong></a>
                                                        </h5>
                                                        <span class="text-sm">{{ $portfolio->subCategory->name_ru }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal for this portfolio -->
                                        <div id="modal-{{ $index }}" class="modal-single" style="display: none;">
                                            <div class="modal-content">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div class="album">
                                                            <div class="responsive-container-block bg " style="margin-bottom: 15px;">
                                                                <div class="responsive-container-block img-cont">
                                                                    <img class="img img-big img-last" src="{{ asset('storage/' . $portfolio->image) }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="modal-description gap-5 row">
                                                            <div class="modal-description-right col-md-12">
                                                                <div class="sidebar">
                                                                    <h3>About</h3>
                                                                    <div class="box-sidebar-rounded">
                                                                        <div class="sidebar-content">
                                                                            <div class="item-line">
                                                                                <div class="text-date-post text-16-bold">Client</div>
                                                                                <p class="text-date-post-value text-md neutral-500">{{ $portfolio->client_name }}</p>
                                                                            </div>
                                                                            <div class="item-line">
                                                                                <div class="text-date-expire text-16-bold">Sector</div>
                                                                                <p class="text-date-post-value text-md neutral-500">{{ $portfolio->sector }}</p>
                                                                            </div>
                                                                            <div class="item-line">
                                                                                <div class="text-location text-16-bold">Location:</div>
                                                                                <p class="text-date-post-value text-md neutral-500">{{ $portfolio->location }}</p>
                                                                            </div>
                                                                            <div class="item-line">
                                                                                <div class="text-salary text-16-bold">Audience</div>
                                                                                <p class="text-date-post-value text-md neutral-500">{{ $portfolio->audience }}</p>
                                                                            </div>
                                                                            <div class="item-line">
                                                                                <div class="text-date-founded text-16-bold">Date</div>
                                                                                <p class="text-date-post-value text-md neutral-500">{{ $portfolio->date }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="image-modal-close-footer" onclick="closeModal({{ $index }})">&times;</span>
                                        </div>
                                        <script>
                                            function openModal(index) {
                                                // Modalni ochish
                                                const modal = document.getElementById(`modal-${index}`);
                                                modal.style.display = 'flex';
                                                document.body.style.overflow = 'hidden';
                                            }

                                            function closeModal(index) {
                                                // Modalni yopish
                                                const modal = document.getElementById(`modal-${index}`);
                                                modal.style.display = 'none';
                                                document.body.style.overflow = '';
                                            }

                                            // Modaldan tashqarida bosilganda yopish
                                            window.onclick = function (event) {
                                                const modals = document.querySelectorAll('.modal-single');
                                                modals.forEach(modal => {
                                                    if (event.target === modal) {
                                                        modal.style.display = 'none';
                                                        document.body.style.overflow = '';
                                                    }
                                                });
                                            };
                                        </script>
                                    @endforeach
                                </div>
                            </div>
                        </section>


                        <section id="awards" class="awards-section" style="margin: 30px 15px 0;">
                            <div class="row">
                                <h2 class="title " style="font-size: 30px; margin-bottom: 15px; padding: 0;">
                                    Награды
                                </h2>
                                @foreach ($awards as $award)
                                    <div class="col-lg-3 col-sm-6">
                                        <div class="card-features-5">
                                            <div class="card-image"><i class="fa-solid fa-award"></i></div>

                                            <div class="card-info">
                                                <h6 style="text-transform: uppercase;">{{ $award->name }}</h6>
                                                <p class="text-sm neutral-500">
                                                    {{ \Carbon\Carbon::parse($award->date)->translatedFormat('F Y') }}</p>
                                                <div class="card-meta mt-3"><a
                                                        class="btn btn-tag-sm  d-flex align-items-center gap-2"
                                                        href="#">
                                                        {{ $award->category }}
                                                        <svg width="10" height="10" viewBox="0 0 14 14"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.176 0.270259L12.4665 0.279699L3.88696 0.594977L3.83354 2.04846L10.6796 1.79436L0.181608 12.2924L1.15388 13.2647L11.6514 2.76716L11.3989 9.61169L12.8523 9.55828L13.1676 0.978687L13.176 0.270259Z"
                                                                fill="white" />
                                                        </svg>
                                                    </a></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>

                        <section id="reviews" class="reviews-section" style="margin: 30px 0px;">
                            <h2 class="title" style="font-size: 30px; margin-bottom: 15px; padding: 0;">Отзывы</h2>
                            @foreach ($reviews as $review)
                                <div class="row detail-term">
                                    <div class="col-lg-12" style="padding:0;">
                                        <div class="list-change-log">
                                            <div class="item-log " style='margin-left:15px'>
                                                <div class="date-log">
                                                    <span class="btn btn-brand-4-sm p-3 mb-4 text-white">DA</span>
                                                    <div style="font-weight: bold">Имя клиента</div>
                                                    <p>{{ $review->full_name }}</p>
                                                    <div style="font-weight: bold">Услуги</div>
                                                    <p>{{ $review->serviceCategory->name_ru }}</p>
                                                    <div style="font-weight: bold">Сектор</div>
                                                    <p>{{ $review->company_industry }}</p>
                                                    <div style="font-weight: bold">Команда</div>
                                                    <p>{{ $review->company_size }}</p>
                                                </div>

                                                <div class="line-log"></div>
                                                <div class="info-log mb-3 w-100">
                                                    <div style="width: 100%" class="">
                                                        <h5 style="font-size: 18px; ">Какова была цель вашего
                                                            сотрудничества?</h5>
                                                        <div id="text-container" style="margin-bottom: 20px;">
                                                            <div id="text-content" class="text-md neutral-500"
                                                                style="line-height: 1.5; margin-top: 15px">
                                                                <div class="truncate-text" id="text-content-full-1">
                                                                    {{ $review->behind_collaboration }}
                                                                </div>
                                                            </div>
                                                            <span data-target="text-content-full-1"
                                                                class="show-more-button">Посмотреть больше</span>
                                                        </div>
                                                        <h5 style="font-size: 18px;">Что вам больше всего понравилось в
                                                            процессе сотрудничества?</h5>
                                                        <div id="text-container" style="margin-bottom: 20px;">
                                                            <div id="text-content" class="text-md neutral-500"
                                                                style="line-height: 1.5; margin-top: 15px">
                                                                <div class="truncate-text" id="text-content-full-2">
                                                                    {{ $review->during_collaboration }}
                                                                </div>
                                                            </div>
                                                            <span data-target="text-content-full-2"
                                                                class="show-more-button">Посмотреть больше</span>
                                                        </div>
                                                        <h5 style="font-size: 18px;">Есть ли области, которые требуют
                                                            улучшения?</h5>
                                                        <div id="text-container" style="margin-bottom: 20px;">
                                                            <div id="text-content" class="text-md neutral-500"
                                                                style="line-height: 1.5; margin-top: 15px">
                                                                <div class="truncate-text" id="text-content-full-3">
                                                                    {{ $review->improvements }}
                                                                </div>
                                                            </div>
                                                            <span data-target="text-content-full-3"
                                                                class="show-more-button">Посмотреть больше</span>
                                                        </div>
                                                        <div class="stars stars-responsive">
                                                            <div>
                                                                <div class="" style="margin-top: 20px;">
                                                                    Бюджет
                                                                </div>
                                                                <div class="card-rates">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <span>
                                                                            <img src="{{ asset('/assets/imgs/template/icons/star.svg') }}"
                                                                                alt="jobhub"
                                                                                style="opacity: {{ $i < floor($review->burget_score) ? '1' : '0.2' }};" />
                                                                        </span>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="" style="margin-top: 20px;">
                                                                    Качество
                                                                </div>
                                                                <div class="card-rates">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <span>
                                                                            <img src="{{ asset('/assets/imgs/template/icons/star.svg') }}"
                                                                                alt="jobhub"
                                                                                style="opacity: {{ $i < floor($review->quality_score) ? '1' : '0.2' }};" />
                                                                        </span>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="" style="margin-top: 20px;">
                                                                    Сроки
                                                                </div>
                                                                <div class="card-rates">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <span>
                                                                            <img src="{{ asset('/assets/imgs/template/icons/star.svg') }}"
                                                                                alt="jobhub"
                                                                                style="opacity: {{ $i < floor($review->schedule_score) ? '1' : '0.2' }};" />
                                                                        </span>
                                                                    @endfor

                                                                </div>
                                                            </div>
                                                            <div>
                                                                <div class="" style="margin-top: 20px;">
                                                                    Сотрудничество
                                                                </div>
                                                                <div class="card-rates">
                                                                    @for ($i = 0; $i < 5; $i++)
                                                                        <span>
                                                                            <img src="{{ asset('/assets/imgs/template/icons/star.svg') }}"
                                                                                alt="jobhub"
                                                                                style="opacity: {{ $i < floor($review->colloboration_score) ? '1' : '0.2' }};" />
                                                                        </span>
                                                                    @endfor
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div
                                style="border: 1px solid #ECEEF2; border-radius: 16px; padding: 20px; margin-top: 20px; display:flex; align-items: center;justify-content: space-between;">
                                <div style="display: flex; align-items: center; gap: 15px;">
                                    <i style="font-size: 24px;" class="fa-regular fa-pen-to-square"></i>
                                    <div>
                                        <h3 style="font-size:22px;">Сотрудничали с нашей компанией?</h3>
                                        <p style="margin-bottom: 0;">Поделитесь своим опытом работы с нами.</p>
                                    </div>
                                </div>
                                <a href="{{ route('singleReviews', $provider->id) }}">
                                    <button class="btn btn-brand-4-medium" type="submit">Оставить отзыв</button>
                                </a>


                            </div>
                        </section>

                        <section id="contact" class="contact-section section-box box-get-touch-section box-contact-form"
                            style="margin: 30px -10px 0px;">
                            <div class="container" styles="padding:0;">
                                <div class="row">
                                    <h2 class="title"
                                        style="font-size: 30px; margin-bottom: 15px; padding: 0; margin-left: 12px;">
                                        Контакт
                                    </h2>
                                    <div class="col-lg-6 mb-30">
                                        <div class="block-map">
                                            <div class="box-map">
                                                <div style="width: 100%">
                                                    <iframe width="100%" height="600" frameborder="0" scrolling="no"
                                                        marginheight="0" marginwidth="0"
                                                        src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Chilanzar%20Street%202/2,%20Tashkent,%20Uzbekistan+()&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed">
                                                        <a href="https://www.gps.ie/">gps vehicle tracker</a>
                                                    </iframe>
                                                </div>
                                            </div>
                                            <!-- <p class="text-md neutral-600 text-center">Hours: 8:00 - 17:00, Mon - Sat </p> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-6">

                                        <a target="_blank" href="{{ $provider->companies->first()->website }}"
                                            style="border-top: 1px solid #ECEEF2; border-bottom: 1px solid #ECEEF2; padding: 20px 10px; font-size: 18px; color: black; display:flex;align-items:center; justify-content:space-between;">
                                            <div>
                                                <i class="fa-solid fa-earth-asia" style="margin-right:10px;"></i>
                                                <span>{{ $provider->companies->first()->website }}</span>
                                            </div>
                                            <i class="fa-solid fa-arrow-right"></i>
                                        </a>

                                        <div
                                            style="border-top: 1px solid #ECEEF2; border-bottom: 1px solid #ECEEF2; padding: 20px 10px; font-size: 18px; color: black;">
                                            <i class="fa-solid fa-location-dot" style="margin-right:10px;"></i>
                                            <span>{{ $provider->companies->first()->address }}</span>
                                        </div>
                                        <div
                                            style="border-top: 1px solid #ECEEF2; border-bottom: 1px solid #ECEEF2; padding: 20px 10px; font-size: 18px; color: black;">
                                            <i class="fa-solid fa-phone" style="margin-right:10px;"></i>
                                            <span>{{ $provider->companies->first()->phone_number }}</span>
                                        </div>

                                        <button class="btn btn-brand-4-medium col-lg-6"
                                            style="justify-content: center; margin:30px 0;"
                                            onclick="openContactModal()">Связаться с DORA
                                        </button>
                                        <p class="text-lg title-follow">
                                            Социальные сети
                                        <div class="box-socials-footer d-flex">
                                            <a class="icon-socials icon-facebook" href="#"><i
                                                    class="fa-brands fa-facebook-f"></i></a>
                                            <a class="icon-socials icon-instagram" href="#"><i
                                                    class="fa-brands fa-linkedin-in"></i></a>
                                            <a class="icon-socials icon-twitter" href="#"><i
                                                    class="fa-brands fa-x-twitter"></i></a>
                                            <a class="icon-socials icon-be" href="#"><i
                                                    class="fa-brands fa-instagram"></i></a>
                                        </div>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>

                </div>
            </div>
        </section>

        <div id="doraModal"
             style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); justify-content: center; align-items: center; z-index:999;">

            <div class="box-border-rounded p-3"
                 style="box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; width: 50%; max-height: 90%; overflow-y: auto; background-color: white; border-radius: 10px;">

                <div class="my-3 p-3">
                    <h4 class="mb-3">Отправить сообщение</h4>
                    <h6 class="mb-2" style="font-size:18px;">Кто вы?</h6>

                    <div class="row">

                        <div class="col-sm-12 col-lg-6 my-2">
                            <label style="width: 100%;">
                                Имя
                                <input type="text">
                            </label>
                        </div>

                        <div class="col-sm-12 col-lg-6 my-2">
                            <label style="width: 100%;">
                                Название компании (по желанию)
                                <input type="text">
                            </label>
                        </div>

                        <div class="col-sm-12 col-lg-6 my-2">
                            <label style="width: 100%;">
                                Электронная почта
                                <input type="text">
                            </label>
                        </div>

                        <div class="col-sm-12 col-lg-6 my-2">
                            <label style="width: 100%;">
                                Номер телефона (по желанию)
                                <input type="text">
                            </label>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 my-2">
                            <label style="width: 100%;">
                                Ваше сообщение
                                <textarea name="message" id="" cols="30" rows="10"></textarea>
                            </label>
                        </div>

                        <div class="col-12 my-2 d-flex justify-content-end">
                            <button type="button" class="btn btn-brand-4-medium"
                                    onclick="sendMessage()">Отправить</button>
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <!-- Toast Notification -->
        <div id="toast" style="display: none;">
            <div class="bg-primary"
                 style="position: fixed; top: 100px; right: 0px; transform: translateX(-50%); color: white; padding: 10px 10px; border-radius: 5px; display: flex;  align-items: center;">
                <i class="fas fa-check-circle" style="margin-right: 10px;  font-size: 24px;"></i>
                Сообщение отправлено!
            </div>
        </div>

        <script>
            function openContactModal() {
                // Modalni ochish
                const modal = document.getElementById('doraModal');
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }

            function closeContactModal() {
                // Modalni yopish
                const modal = document.getElementById('doraModal');
                modal.style.display = 'none';
                document.body.style.overflow = '';
            }

            // Modaldan tashqarida bosilganda yopish
            window.onclick = function (event) {
                const modal = document.getElementById('doraModal');
                if (event.target === modal) {
                    closeContactModal();
                }
            };

            function sendMessage() {
                const toast = document.getElementById('toast');
                toast.style.display = 'block';
                setTimeout(function () {
                    toast.style.display = 'none';
                }, 3000);

                closeContactModal();
            }
        </script>


    </main>

@endsection
