@extends('frontend.layouts.login')

@section('title', 'Start Building Business Stories')

@section('content')

  <main class="main">

    <section class="section-box box-our-offices h-100 d-flex align-items-center">
      <div class="container">

        <div class="box-swiper mt-100">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="row">
                  <div class="col-lg-4">
                    <div class="card-features-6 text-center">
                        <div class="card-image">
                            <i style="font-size: 44px; color: #C5FF41;" class="fa-solid fa-users"></i>
                        </div>
                        <div class="card-info">
                            <h5 class="mb-12">Я клиент, <br><span style="font-weight: 300;">ищу поставщиков</span></h5>
                            <p class="mb-12 text-md neutral-300">Ищете надежных поставщиков для вашего бизнеса? Зарегистрируйтесь и начните поиск уже сейчас!</p>
                            <!-- Linkni o'chirilgan qilish -->
                            <a class="btn btn-link-white mt-20" href="{{ route('client.login') }}">
                                <svg width="38" height="38" viewbox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="38" height="38" rx="19" fill=""></rect>
                                    <g clip-path="url(#clip0_5_2504)">
                                        <path d="M23.6537 16.8139L14.718 25.7497L13.25 24.2817L22.1847 15.3459H14.31V13.2695H25.7301V24.6897H23.6537V16.8139Z" fill="#191919"></path>
                                    </g>
                                    <defs>
                                        <clippath id="clip0_5_2504">
                                            <rect width="13" height="13" fill="white" transform="translate(13 13)"></rect>
                                        </clippath>
                                    </defs>
                                </svg>Войти как клиент
                            </a>
                        </div>
                    </div>
                  </div>

                  <div class="col-lg-4" style="text-align: center;">
                    <div class="card-features-6">
                      <div class="card-image"> <i style="font-size: 44px; color: #C5FF41;" class="fa-solid fa-shop"></i></div>
                      <div class="card-info">
                        <h5 class="mb-12">Я поставщик, <br><span style="font-weight: 300;">ищу проекты</span></h5>
                        <p class="mb-12 text-md neutral-300">Зарегистрируйте свой бизнес, чтобы увеличить его онлайн видимость и получение соответствующих возможностей.</p>
                        <!-- <p class="text-md neutral-300 mb-30">Hours: 8:00 - 17:00, Mon - Sat </p> -->
                        <a class="btn btn-link-white mt-20" href="{{ route('login.provider') }}">
                          <svg width="38" height="38" viewbox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="38" height="38" rx="19" fill=""></rect>
                            <g clip-path="url(#clip0_5_2504)">
                              <path d="M23.6537 16.8139L14.718 25.7497L13.25 24.2817L22.1847 15.3459H14.31V13.2695H25.7301V24.6897H23.6537V16.8139Z" fill="#191919"></path>
                            </g>
                            <defs>
                              <clippath id="clip0_5_2504">
                                <rect width="13" height="13" fill="white" transform="translate(13 13)"></rect>
                              </clippath>
                            </defs>
                          </svg>Войти как поставщик</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4" style="text-align: center;">
                    <div class="card-features-6" style="opacity: 0.5; pointer-events: none;">
                        <div class="card-image">
                            <i style="font-size: 44px; color: #C5FF41;" class="fa-solid fa-user"></i>
                        </div>
                        <div class="card-info">
                            <h5 class="mb-12">Я маркетолог., <br><span style="font-weight: 300;">ищу проекты</span></h5>
                            <p class="mb-12 text-md neutral-300">Технические работы. Пожалуйста, попробуйте позже.</p>
                            <!-- Linkni o'chirilgan qilish -->
                            <a class="btn btn-link-white mt-20" href="javascript:void(0)" style="cursor: not-allowed; text-decoration: none;">
                                <svg width="38" height="38" viewbox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect width="38" height="38" rx="19" fill=""></rect>
                                    <g clip-path="url(#clip0_5_2504)">
                                        <path d="M23.6537 16.8139L14.718 25.7497L13.25 24.2817L22.1847 15.3459H14.31V13.2695H25.7301V24.6897H23.6537V16.8139Z" fill="#191919"></path>
                                    </g>
                                    <defs>
                                        <clippath id="clip0_5_2504">
                                            <rect width="13" height="13" fill="white" transform="translate(13 13)"></rect>
                                        </clippath>
                                    </defs>
                                </svg>Технические работы маркетолог
                            </a>
                        </div>
                    </div>
                </div>

                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <style>
    @media only screen and (min-width: 992px) {
      .main {
        height: 100vh;
      }
      .footer {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
      }
    }

  </style>
@endsection
