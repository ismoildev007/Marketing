@extends('frontend.layouts.main')

@section('title', 'Page Title')
@section('description', 'Page description')


@section('content')

    <main class="main">

        <style>
            .size-text {
                display: -webkit-box;
                -webkit-line-clamp: 4; /* Matnni 4 qatorda cheklash */
                -webkit-box-orient: vertical;
                overflow: hidden;
                text-overflow: ellipsis; /* Ortib ketgan matnni '...' bilan ko'rsatish */
            }
        </style>

        <section class="section-box box-all-integrations">
            <form action="{{ route('filter.providers') }}" method="GET">
                
                <div class="container" style="display: flex; gap: 30px;">

                    <div id="filter-box-1" class="sidebar-shadow none-shadow mb-30 filter-box"
                         style="width: 27%; padding: 30px 20px; background-color: #E9ECEF; border-radius: 16px; margin-bottom: 30px !important; height: 100%;">
                        <div class="sidebar-filters">
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15" style="font-size: 20px;">Ключевые слова</h5>
                                <div class="form-group">
                                    <input type="text" name="description" class="form-control"
                                        placeholder="Введите ключевые слова, навыки ..." />
                                </div>
                            </div>
                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15" style="font-size: 20px;">Местоположение</h5>
                                <div class="form-group">
                                    <input type="text" name="company_address" class="form-control form-icons" placeholder="Местоположение"/>
                                    <i class="fi-rr-marker"></i>
                                </div>
                            </div>

                            <div class="filter-block mb-30">

                                <h5 class="medium-heading mb-15" style="font-size: 20px;">Опыт в отрасли</h5>
                                <div class="form-group select-style select-style-icon">
                                    <select class="form-control form-icons select-active" name="sub_category_id">
                                        <option value="">Выберите услугу</option>
                                        @foreach($sub_categories as $sub_category)
                                            <option value="{{$sub_category->id}}">{{$sub_category->name_ru}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fi-rr-briefcase"></i>
                                </div>

                            </div>

                            <div class="filter-block mb-40">

                                <h5 class="medium-heading mb-25" style="font-size: 20px;">Диапазон зарплаты</h5>
                                <div class="row">
                                        <div class="col-lg-6">
                                            <label class="lb-slider">От</label>
                                            <div class="form-group minus-input">
                                                <input type="text" name="price_range[min]" class="input-disabled form-control min-value-money" placeholder="Minimal narx" value="735">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="lb-slider">До</label>
                                            <div class="form-group">
                                                <input type="text" name="price_range[max]" class="input-disabled form-control max-value-money" placeholder="Maksimal narx" value="6000000">
                                            </div>
                                        </div>
                                    </div>

                                <div class="card-conteiner">
                                    <div class="card-content">
                                        <div class="rangeslider">
                                            <input class="min input-ranges" name="range_1_min" type="range" min="200" max="10000" value="735"
                                                   oninput="updateMinValue(this.value)">
                                            <input class="max input-ranges" name="range_1_max" type="range" min="300" max="10000000" value="6000000"
                                                   oninput="updateMaxValue(this.value)">
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    function updateMinValue(value) {
                                        document.querySelector('.min-value-money').value = value;
                                        document.querySelector('.min-value').value = value;
                                    }

                                    function updateMaxValue(value) {
                                        document.querySelector('.max-value-money').value = value;
                                        document.querySelector('.max-value').value = value;
                                    }
                                </script>

                            </div>

                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15" style="font-size: 20px;">Языки</h5>
                                <div class="form-group select-style select-style-icon">
                                    <select class="form-control form-icons select-active" name="language_id">
                                        @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name_ru}}</option>
                                        @endforeach
                                    </select>
                                    <i class="fi-rr-briefcase"></i>
                                </div>
                            </div>

                            <div class="filter-block mb-30">
                                <h5 class="medium-heading mb-15" style="font-size: 20px;">Размер команды</h5>
                                <div class="form-group select-style select-style-icon">
                                    <select class="form-control form-icons select-active" name="number_of_team">
                                        <option value="">Выберите размер команды</option>
                                        <option value="1">Фриланс (1)</option>
                                        <option value="2-10">Студия (2-10)</option>
                                        <option value="11-50">Агентство (11-50)</option>
                                        <option value="50+">Группа (50+)</option>
                                    </select>
                                    <i class="fi-rr-briefcase"></i>
                                </div>
                            </div>



                            <div class="buttons-filter">
                                <button class="btn btn-default" type="submit" style="background-color: #db1823; color: #fff; border-radius: 8px;">
                                    Применить фильтр
                                </button>
                                <a href="{{route('providers')}}"  class="btn">Сбросить фильтр </a>
                            </div>
                        </div>
                    </div>

                    <div style="width: 70%;" class="right-side-search-provider">
                        
                        <div class="row">

                            <button id="change-filter-btn" class="filter-button-responsive" onClick="toggleFilter()">
                                Показать фильтр
                            </button>

                            @if ($message)
                                <p class="text-danger">
                                    <section class="section-box wow animate__animated animate__fadeIn box-404 animated" style="visibility: visible;">
                                        <div class="text-center">
                                        <h2 class="heading-2 mt-15 mb-20">Page Not Found</h2>
                                        <p class="text-lg neutral-500 mb-35">The page you are looking for doesn't exist or has been moved</p><a class="btn btn-brand-4 text-white" href="/">Back to Home Page
                                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none">
                                            <path d="M22 10.9993L18.4791 7.47852V10.3064H0V11.6924H18.4791V14.5203L22 10.9993Z" fill=""></path>
                                            </svg></a>
                                        </div>
                                    </section>
                                </p>
                            @endif

                            @if ($providers && $providers->isNotEmpty())
                              @foreach($providers as $provider)
                                  @if (!empty($provider->companies))
                                      <div class="col-lg-6 col-md-6 card-integration-big">
                                          <div class="card-integration">
                                              @foreach ($provider->companies as $company)
                                                  @if (!empty($company->id))
                                                      <div class="card-image">
                                                          <div class="card-image-left">
                                                              <img style="border-radius: 50%;" src="{{ asset('storage/' . $company->logo) }}" alt="{{ $provider->name }}">
                                                          </div>
                                                          <div class="card-image-info">
                                                              <h5>{{ $provider->name }}</h5>
                                                              <p class="text-md neutral-500">{{ $company->tagline }}</p>
                                                          </div>
                                                      </div>
                                                  @endif
                                              @endforeach
                                              <div class="card-info">
                                                  <a class="btn btn-learmore-2" href="{{ route('singleProviders', $provider->id) }}">
                                                      <span>
                                                          <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                              <g clip-path="url(#clip0_24_999)">
                                                                  <path d="M10.6557 3.81393L1.71996 12.7497L0.251953 11.2817L9.18664 2.34592H1.31195V0.269531H12.7321V11.6897H10.6557V3.81393Z" fill="#ffffff"></path>
                                                              </g>
                                                              <defs>
                                                                  <clippath id="clip0_24_999">
                                                                      <rect width="13" height="13" fill="white"></rect>
                                                                  </clippath>
                                                              </defs>
                                                          </svg>
                                                      </span>
                                                      Подробнее
                                                  </a>
                                              </div>
                                          </div>
                                      </div>
                                  @endif
                              @endforeach
                            @endif

                            @if ($providers instanceof \Illuminate\Pagination\LengthAwarePaginator && $providers->total() > 10)
                                <div class="text-center card-integration-big">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination">
                                            @if ($providers->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link" aria-hidden="true">
                                                        <!-- Previous SVG -->
                                                    </span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $providers->previousPageUrl() }}" aria-label="Previous">
                                                        <span aria-hidden="true">
                                                            <!-- SVG -->
                                                        </span>
                                                    </a>
                                                </li>
                                            @endif

                                            @foreach ($providers->links()->elements[0] as $page => $url)
                                                @if ($page == $providers->currentPage())
                                                    <li class="page-item active">
                                                        <a class="page-link" href="#">{{ $page }}</a>
                                                    </li>
                                                @else
                                                    <li class="page-item">
                                                        <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                                    </li>
                                                @endif
                                            @endforeach

                                            @if ($providers->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $providers->nextPageUrl() }}" aria-label="Next">
                                                        <span aria-hidden="true">
                                                            <!-- SVG -->
                                                        </span>
                                                    </a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link" aria-hidden="true">
                                                        <!-- SVG -->
                                                    </span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            @endif


                            <script>
                                $(document).ready(function () {
                                    $('.pagination .page-link').on('click', function (e) {
                                        e.preventDefault(); // Linkni sahifaga o'tishni to'xtatish uchun
                                        $('.pagination .page-link').removeClass('active'); // Barcha active klasslarini olib tashlash
                                        $(this).addClass('active'); // Bosilgan linkka active klassini qo'shish
                                    });
                                });
                            </script>

                        </div>

                    </div>

                </div>

            </form>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-how-it-work">
            <div class="container"><a class="btn btn-brand-4-sm text-white" href="#">Как это работает</a>
                <h2 class="mt-15 mb-20">Простая и эффективная система для <br /> подключения лучших поставщиков услуг.</h2>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="box-border-rounded">
                            <div class="card-casestudy">
                                <div class="card-title">
                                    <h6 style="font-size: 16px;"><span class="number text-white">1</span>Зарегистрируйтесь для услуги</h6>
                                </div>
                                <div class="card-desc">
                                    <p>
                                        Этот процесс прост и удобен. Мы создаем условия, при которых вы сможете 
                                        быстро найти подходящие решения, разработанные специально для ваших потребностей. 
                                        Зарегистрируйтесь и начните пользоваться нашими услугами уже сегодня.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-border-rounded">
                            <div class="card-casestudy">
                                <div class="card-title">
                                    <h6 style="font-size: 16px;"><span class="number text-white">2</span>Исследование и разработка</h6>
                                </div>
                                <div class="card-desc">
                                    <p>
                                        Мы тщательно изучаем ваши потребности и цели. 
                                        На основе этого мы создаем индивидуальные стратегии и решения, 
                                        чтобы обеспечить их соответствие вашим ожиданиям и задачам.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="box-border-rounded">
                            <div class="card-casestudy">
                                <div class="card-title">
                                    <h6 style="font-size: 16px;"><span class="number text-white">3</span>Продажи и доходы</h6>
                                </div>
                                <div class="card-desc">
                                    <p>
                                        Мы следим за производительностью, оптимизируем кампании 
                                        и гарантируем достижение ожидаемых результатов. 
                                        Это последний шаг на пути к успеху и увеличению дохода вашего проекта.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <x-join-us />
        </section>

    </main>
@endsection
