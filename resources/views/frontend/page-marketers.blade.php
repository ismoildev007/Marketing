@extends('frontend.layouts.main')

@section('title', 'Page Title')
@section('description', 'Page description')


@section('content')
<main class="main">
    <x-comming-soon />
    <section class="section-box box-all-integrations">
        <div class="container" style="display: flex; gap: 30px;">
                
            <div id="filter-box-1" class="sidebar-shadow none-shadow mb-30 filter-box d-none"
                style="width: 27%; padding: 30px 20px; background-color: #E9ECEF; border-radius: 16px; margin-bottom: 30px !important; height: 100%;">
                <div class="sidebar-filters">

                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15" style="font-size: 20px;">Ключевые слова</h5>
                        <div class="form-group">
                            <input type="text" name="skills" class="form-control"
                                    placeholder="Введите ключевые слова, навыки ..."/>
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
                                @if(!empty($sub_categories))
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name_ru}}</option>
                                    @endforeach
                                @endif
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
                                        <input type="text" name="price_range[min]" class="input-disabled form-control min-value-money" placeholder="Minimal narx" value="{{ request('price_range.min') }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label class="lb-slider">До</label>
                                    <div class="form-group">
                                        <input type="text" name="price_range[max]" class="input-disabled form-control max-value-money" placeholder="Maksimal narx" value="{{ request('price_range.max') }}">
                                    </div>
                                </div>
                            </div>

                        <div class="card-conteiner">
                            <div class="card-content">
                                <div class="rangeslider">
                                    <input class="min input-ranges" name="range_1_min" type="range" min="1" max="10000" value="735"
                                            oninput="updateMinValue(this.value)">
                                    <input class="max input-ranges" name="range_1_max" type="range" min="1" max="10000" value="6465"
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
                                <option value="">Comming soon</option>
                                @if(!empty($languages))
                                    @foreach($languages as $language)
                                        <option value="{{$language->id}}">{{$language->name_ru}}</option>
                                    @endforeach
                                @endif
                            </select>
                            <i class="fi-rr-briefcase"></i>
                        </div>
                    </div>

                    <div class="filter-block mb-30">
                        <h5 class="medium-heading mb-15" style="font-size: 20px;">Размер команды</h5>
                        <div class="form-group select-style select-style-icon">
                            <select class="form-control form-icons select-active" name="team_size">
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

            <div style="width: 70%;" class="right-side-search-provider d-none">
            <div class="row">
                <button id="change-filter-btn" class="filter-button-responsive">
                Show Filter
            </button>

                <div id="filter-box-2" class="sidebar-shadow none-shadow mb-30 filter-box-responsive" style="border:none; border-radius:0 !important; box-shadow: 0 0 0 0 rgba(0, 0, 0, 0); width: 100%; padding: 30px 20px; background-color: #E9ECEF; margin-bottom: 30px !important; height: 100%; position:fixed; top:0; z-index:999; overflow: auto;">
                    <div class="sidebar-filters ">
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-15" style="font-size: 20px;">Keywords</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Type keywords, skills..." />
                            </div>
                        </div>
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-15" style="font-size: 20px;">Location</h5>
                            <div class="form-group">
                                <input type="text" class="form-control form-icons" placeholder="Location" />
                                <i class="fi-rr-marker"></i>
                            </div>
                        </div>
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-15" style="font-size: 20px;">Industry experience</h5>
                            <div class="form-group select-style select-style-icon">
                                <select class="form-control form-icons select-active">
                                    <option>Accounting</option>
                                    <option>Architecture & Planning</option>
                                    <option>Art & Handcraft</option>
                                    <option>Automotive</option>
                                </select>
                                <i class="fi-rr-briefcase"></i>
                            </div>
                        </div>
                        <div class="filter-block mb-40">
                            <h5 class="medium-heading mb-25" style="font-size: 20px;">Salary Range</h5>
                            <div class="">
                                <div class="row" style="display: flex;">
                                    <div class="col-lg-6 col-sm-6" style="width: 50%;">
                                        <label class="lb-slider">From</label>
                                        <div class="form-group minus-input">
                                            <input  type="text" name="min-value-money" class="input-disabled form-control min-value-money"  value="" />
                                            <input type="hidden" name="min-value" class="form-control min-value" value="" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6" style="width: 50%;">
                                        <label class="lb-slider">To</label>
                                        <div class="form-group">
                                            <input input type="text" name="max-value-money" class="input-disabled form-control max-value-money" value="" />
                                            <input type="hidden" name="max-value" class="form-control max-value" value="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="card-conteiner">
                                <div class="card-content" style="max-width: 100%;">
                                    <div class="rangeslider">
                                    <input class="min input-ranges" name="range_1" type="range" min="1" max="10000" value="735">
                                    <input class="max input-ranges" name="range_1" type="range" min="1" max="10000" value="6465">
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-15" style="font-size: 20px;">Languages</h5>
                            <div class="form-group select-style select-style-icon">
                                <select class="form-control form-icons select-active">
                                    <option>Uzbek</option>
                                    <option>English</option>
                                    <option>Russian</option>
                                </select>
                                <i class="fi-rr-briefcase"></i>
                            </div>
                        </div>
                        <div class="filter-block mb-30">
                            <h5 class="medium-heading mb-15" style="font-size: 20px;">Team size</h5>
                            <div class="form-group select-style select-style-icon">
                                <select class="form-control form-icons select-active">
                                    <option>Freelance (1)</option>
                                    <option>Studion (2-10)</option>
                                    <option>Agency (11-50)</option>
                                    <option>Group (50+)</option>
                                </select>
                                <i class="fi-rr-briefcase"></i>
                            </div>
                        </div>
                        <div class="buttons-filter" style= "display: flex; justify-content: center;";>
                            <button class="btn btn-default" style="background-color: transparent; border: 2px solid #C5FF41; border-radius: 8px; font-size: 16px !important;" id="change-filter-btn-2">Cancel</button>
                            <button class="btn" style="font-size: 16px !important;">Reset filter</button>
                            <button class="btn btn-default" style="background-color: #C5FF41; border-radius: 8px; font-size: 16px !important;">Apply filter</button>
                        </div>
                    </div>
                </div>
                <div style="width: 100%;" class="right-side-search-provider">
                    <div class="content-page">
                        <div class="row">
                            @if(!empty($marketers))
                                @foreach($marketers as $marketer)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="card-grid-2 hover-up">
                                            <div class="card-grid-2-link">
                                                <a href="#"><i class="fi-rr-shield-check"></i></a>
                                                <a href="#"><i class="fi-rr-bookmark"></i></a>
                                            </div>
                                            <div class="text-center card-grid-2-image-rd online">
                                                <a href="{{ route('singleMarketers', $marketer->id) }}">
                                                    <figure><img alt="jobhub" src="/assets/imgs/img-candidate.png" /></figure>
                                                </a>
                                            </div>
                                            <div class="card-block-info">
                                                <div class="card-profile">
                                                    <a href="{{ route('singleMarketers',$marketer->id) }}"><strong>{{$marketer->name}}</strong></a>
                                                    <span class="text-sm">UI/UX Designer</span>
                                                    <div class="rate-reviews-small">
                                                        <span><img src="/assets/imgs/icons/star.svg" alt="jobhub" /></span>
                                                        <span><img src="/assets/imgs/icons/star.svg" alt="jobhub" /></span>
                                                        <span><img src="/assets/imgs/icons/star.svg" alt="jobhub" /></span>
                                                        <span><img src="/assets/imgs/icons/star.svg" alt="jobhub" /></span>
                                                        <span><img src="/assets/imgs/icons/star.svg" alt="jobhub" /></span>
                                                        <span class="ml-10 text-muted text-small">(5.0)</span>
                                                    </div>
                                                </div>
                                                <div class="employers-info d-flex align-items-center justify-content-center mt-15">
                                                    <span class="d-flex align-items-center"><i class="fi-rr-marker mr-5 ml-0"></i> Chicago, US</span>
                                                    <span class="d-flex align-items-center ml-25"><i class="fi-rr-briefcase mr-5"></i>Software</span>
                                                </div>
                                                <div class="card-2-bottom card-2-bottom-candidate mt-30">
                                                    <div class="text-center">
                                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Figma</a>
                                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Adobe XD</a>
                                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">PSD</a>
                                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">App</a>
                                                        <a href="#" class="btn btn-tags-sm mb-10 mr-5">Digital</a>
                                                    </div>
                                                    <div class="text-center mt-25 mb-5">
                                                        <a href="{{ route('singleMarketers',$marketer->id) }}" class="btn btn-brand-4-medium hover-up" style="margin: 0 auto; display:inline">View profile</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                Comming soon
                            @endif
                        </div>
                    </div>
                </div>

                @if(!empty($marketers) === null)
                    <div class="text-center card-integration-big">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <!-- Previous sahifaga o'tish -->
                                @if ($marketers->onFirstPage())
                                    <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                                    <path d="M10 3.33398L5.33333 8.00065L10 12.6673" stroke="#191919" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $marketers->previousPageUrl() }}"
                                            aria-label="Previous">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                        fill="none">
                                        <path d="M10 3.33398L5.33333 8.00065L10 12.6673" stroke="#191919" stroke-width="1.33333"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                        </a>
                                    </li>
                                @endif

                                <!-- Sahifalar -->
                                @foreach ($marketers->links()->elements[0] as $page => $url)
                                    @if ($page == $marketers->currentPage())
                                        <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach

                                <!-- Next sahifaga o'tish -->
                                @if ($marketers->hasMorePages())
                                    <li class="page-item">
                                        <a class="page-link" href="{{ $marketers->nextPageUrl() }}"
                                            aria-label="Next">
                                <span aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16"
                                        fill="none">
                                        <path d="M6 3.33398L10.6667 8.00065L6 12.6673" stroke="#191919" stroke-width="1.33333"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                                        </a>
                                    </li>
                                @else
                                    <li class="page-item disabled">
                            <span class="page-link" aria-hidden="true">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewbox="0 0 16 16" fill="none">
                                    <path d="M6 3.33398L10.6667 8.00065L6 12.6673" stroke="#191919" stroke-width="1.33333"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </span>
                                    </li>
                                @endif
                            </ul>
                        </nav>
                    </div>
                @else
                    
                @endif
                </div>
            </div>
        </div>
    </section>
    <section class="section-box wow animate__animated animate__fadeIn box-how-it-work">
        <div class="container">
            <a class="btn btn-brand-4-sm text-white" href="javascript:void(0)">Как это работает</a>
            <h2 class="mt-15 mb-20">Всего 3 простых и быстрых шага,<br class="d-none d-lg-block">чтобы создать идеальную автоматическую систему заработка</h2>
            {{-- <p class="text-lg neutral-500 mb-55">Bole nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo conididunt ut labore et dolore<br class="d-none d-lg-block">magna aliqua ut enim ad minim veniam</p> --}}
            <div class="row">
            <div class="col-lg-4">
                <div class="box-border-rounded">
                <div class="card-casestudy">
                    <div class="card-title">
                    <h6><span class="number text-white">1</span>Регистрация</h6>
                    </div>
                    <div class="card-desc">
                    <p>Этот процесс прост и быстр, с учетом вашего удобства. Вы сможете легко получить доступ к персонализированным решениям и специальным предложениям, чтобы как можно скорее начать пользоваться нашими услугами.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-border-rounded">
                <div class="card-casestudy">
                    <div class="card-title">
                    <h6><span class="number text-white">2</span>Исследования и Разработка</h6>
                    </div>
                    <div class="card-desc">
                    <p>Мы тщательно изучаем ваши потребности и цели. Мы создаем индивидуальную стратегию и решения, которые точно отражают ваши ожидания и помогают достичь поставленных задач.</p>
                    </div>
                </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="box-border-rounded">
                <div class="card-casestudy">
                    <div class="card-title">
                    <h6><span class="number text-white">3</span>Продажи и Доход</h6>
                    </div>
                    <div class="card-desc">
                    <p>Мы контролируем результаты, оптимизируем кампании и обеспечиваем достижение ожидаемых результатов. Это завершающий шаг, который гарантирует ваш успех и прибыль от проекта.</p>
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
