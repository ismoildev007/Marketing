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

                <div class="container">
                    <div class="row mb-4">
                        <div class="box-banner-left"><a class="btn btn-brand-4-sm text-white" href="#">Рейтинг</a>
                            <h1 class="display-3 mb-30 mt-25">Рейтинг маркетинговых <br> ИТ и брендинговых компаний</h1>
                            <p class="text-lg neutral-500 mb-55">
                                На Marketing.uz вы найдете рейтинг лучших маркетинговых, ИТ и брендинговых компаний Узбекистана. 
                                Качественные услуги, выбор ведущих компаний и вся необходимая информация в одном месте!
                            </p>
                        </div>
                    </div>
                    <div class="row mb-3 justify-content-end">
                        <div class="col-sm-12 col-lg-4 d-flex align-items-center">

                            <h5 class="medium-heading me-3" style="font-size: 20px;">Услугу:</h5>
                            <div class="form-group select-style select-style-icon mb-0">
                                <select class="form-control form-icons select-active" name="sub_category_id">
                                    <option value="">Выберите услугу</option>
                                    @foreach($sub_categories as $sub_category)
                                        <option value="{{$sub_category->id}}">{{$sub_category->name_ru}}</option>
                                    @endforeach
                                </select>
                                <i class="fi-rr-briefcase"></i>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="right-side-search-provider col-12">
                            <div class="row">

                                @if ($providers->isNotEmpty())
                                    @php $counter = 1; @endphp <!-- Hisoblagichni boshlash -->
                                    @foreach($providers as $provider)

                                        @if ($provider->companies->isNotEmpty())
                                            <div class="col-12 card-integration-big">
                                                <div class="card-integration row">
                                                    @foreach ($provider->companies as $company)
                                                        @if (!empty($company->id))
                                                            <div class="col-sm-12 col-lg-8 position-relative">
                                                                <div class="card-image pb-0 mb-0 position-relative" style="border-bottom: none;">
                                                                    <!-- Reyting elementi -->
                                                                    <div class="rating-badge me-3" data-ranking="{{ $counter }}">#{{ $counter }}</div>
                                                                    
                                                                    <div class="card-image-info">
                                                                        <h5>{{ $provider->name }}</h5>
                                                                        <p class="text-md neutral-500">{{ $company->tagline }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <style>
                                                                .rating-badge {
                                                                        display: inline-block;
                                                                        padding: 18px 21px;
                                                                        border-radius: 50%;
                                                                        font-weight: bold;
                                                                        font-size: 14px;
                                                                        color: #ffffff; /* Oq rangdagi matn */
                                                                        background-color: #FFD700; /* Default sariq rang */
                                                                        position: relative;
                                                                    }

                                                                    /* 1-o'rin: Sariq rang */
                                                                    .rating-badge[data-ranking="1"] {
                                                                        background-color: #db1823; /* Sariq */
                                                                    }

                                                                    /* 2-o'rin: Biroz to'q sariq */
                                                                    .rating-badge[data-ranking="2"] {
                                                                        background-color: #db1823ad; /* Sariqqa moil */
                                                                    }

                                                                    /* 3-o'rin: Och sariq */
                                                                    .rating-badge[data-ranking="3"] {
                                                                        background-color: #db182357; /* Och sariq */
                                                                    }

                                                                    /* Boshqa o'rinlar uchun neytral rang */
                                                                    .rating-badge[data-ranking]:not([data-ranking="1"]):not([data-ranking="2"]):not([data-ranking="3"]) {
                                                                        background-color: #E0E0E0; /* Kulrang */
                                                                        color: #000000; /* Qora matn */
                                                                    }

                                                            </style>
                                                            <div class="col-sm-12 col-lg-4 d-none d-lg-flex align-items-end justify-content-end">
                                                                <a class="btn btn-learmore-2" href="{{ route('singleProviders', $provider->id) }}">
                                                                    <span>
                                                                        <svg width="13" height="13" viewbox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <g clip-path="url(#clip0_24_999)">
                                                                                <path
                                                                                    d="M10.6557 3.81393L1.71996 12.7497L0.251953 11.2817L9.18664 2.34592H1.31195V0.269531H12.7321V11.6897H10.6557V3.81393Z"
                                                                                    fill="#ffffff"></path>
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
                                                            @php $counter++; @endphp <!-- Hisoblagichni oshirish -->
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>

                </div>

            </form>
        </section>
        
        <section class="section-box wow animate__animated animate__fadeIn box-how-it-work">            
            <x-join-us />
        </section>

    </main>
@endsection
