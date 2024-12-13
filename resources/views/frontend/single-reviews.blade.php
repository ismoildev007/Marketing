@extends('frontend.layouts.main')

@section('title', 'Page Title')
@section('description', 'Page description')


@section('content')

    <main class="main">
        <section class="section-box box-content-feature box-content-feature-2 pb-0 pt-40">
            <div class="container">
                <div class="text-center"> 
                    <span class="btn btn-bg-brand-4 mb-25 text-white px-3 py-2">Отзывы</span>
                    <h2 class="mt-15 mb-15">Поделитесь своим опытом сотрудничества</h2>
                    <p class="text-lg neutral-500 mb-25">Мы ценим ваш отзыв о качестве услуг и профессионализме, чтобы помочь другим в выборе надежных партнеров.</p>
                </div>
            </div>
        </section>
        <section>
            <div class="box-of-review">
                <!-- Tugmalar faqat LG ekranlarida ko'rinadi -->
                <div class="menu-with-js d-none d-sm-none d-lg-block">
                    <button class="menu-button active-button" id="rate-your-experience"
                            onclick="showForm('rate-your-experience')">
                        <i class="fa-solid fa-star-half-stroke"></i> Оцените ваш опыт
                    </button>
                    <button class="menu-button" id="describe-your-experience"
                            onclick="showForm('describe-your-experience')">
                        <i class="fa-regular fa-newspaper"></i> Опишите ваш опыт
                    </button>
                    <button class="menu-button" id="personal-information" onclick="showForm('personal-information')">
                        <i class="fa-regular fa-user"></i> Личная информация
                    </button>
                </div>

                <!-- 1-Forma: Rate your experience -->
                <form class="rate-your-experience active-form">
                    @csrf
                    <div class="texts-top">
                        <h3>Выразите свое мнение о качестве предоставленных услуг</h3>
                        <p>Оцените и помогите другим выбрать подходящее агентство.</p>
                    </div>
                    <div class="star-reviews-box pb-4">
                        <!-- Yulduzlar -->
                        <div class="star-review" id="budget-review">
                            <label>Бюджет *</label>
                            <span>Насколько вы удовлетворены пониманием, гибкостью и уважением к вашему бюджету?</span>
                            <div class="star-buttons">
                                <button class="star-button" type="button" data-index="1"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="2"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="3"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="4"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="5"><i
                                        class="fa-solid fa-star"></i></button>
                            </div>
                            <input type="hidden" name="burget_score" id="burget_score" required>
                        </div>
                        <div class="star-review" id="quality-review">
                            <label>Качество *</label>
                            <span>Насколько вы удовлетворены качеством предоставленных услуг?</span>
                            <div class="star-buttons">
                                <button class="star-button" type="button" data-index="1"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="2"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="3"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="4"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="5"><i
                                        class="fa-solid fa-star"></i></button>
                            </div>
                            <input type="hidden" name="quality_score" id="quality_score" required>
                        </div>

                        <div class="star-review" id="schedule-review">
                            <label>График *</label>
                            <span>Насколько вы удовлетворены соблюдением графика и сроков?</span>
                            <div class="star-buttons">
                                <button class="star-button" type="button" data-index="1"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="2"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="3"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="4"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="5"><i
                                        class="fa-solid fa-star"></i></button>
                            </div>
                            <input type="hidden" name="schedule_score" id="schedule_score" required>
                        </div>

                        <div class="star-review" id="colloboration-review">
                            <label>Сотрудничество *</label>
                            <span>Насколько вы удовлетворены сотрудничеством и коммуникацией?</span>
                            <div class="star-buttons">
                                <button class="star-button" type="button" data-index="1"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="2"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="3"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="4"><i
                                        class="fa-solid fa-star"></i></button>
                                <button class="star-button" type="button" data-index="5"><i
                                        class="fa-solid fa-star"></i></button>
                            </div>
                            <input type="hidden" name="colloboration_score" id="colloboration_score" required>
                        </div>

                    </div>
                </form>

                <!-- 2-Forma: Describe your experience -->
                <form class="describe-your-experience"
                      style="display: none;">
                    @csrf
                    <div class="texts-top">
                        <h3>Расскажите о выполненной работе</h3>
                        <p>Оставьте отзыв и помогите другим выбрать подходящее агентство.</p>
                    </div>
                    <div class="star-reviews-box pb-4">
                        <!-- Textarea va select elementlari -->
                        <div class="star-review">
                            <label style="margin-bottom: 16px;">Какова была цель вашего сотрудничества? *</label>
                            <textarea class="js-textareaThe" style="height: 100px;"
                                      placeholder="Опишите основную задачу, которую вы хотели решить в рамках сотрудничества."
                                      id="behind_collaboration" name="behind_collaboration"></textarea>
                        </div>
                        <div class="star-review">
                            <label style="margin-bottom: 16px;">Что вам больше всего понравилось в сотрудничестве? *</label>
                            <textarea class="js-textareaSelect" id="during_collaboration" name="during_collaboration"
                                      placeholder="Укажите один или несколько моментов, которые вам особенно понравились в процессе работы с агентством."></textarea>
                        </div>
                        <div class="star-review">
                            <label style="margin-bottom: 16px;">Есть ли области для улучшения? (по желанию) *</label>
                            <textarea class="js-textareaIf" id="improvements" name="improvements"
                                      placeholder="Дайте рекомендации или предложите улучшения, если это необходимо."></textarea>
                        </div>
                        <div class="row">
                            <div class="star-review col-sm-12 col-lg-6">
                                <label style="margin-bottom: 16px;">Какую услугу предоставило агентство? (по желанию) *</label>
                                <select class="js-select w-100" name="service_category_id" required>
                                    <option value="">Выберите предоставленную услугу из списка.</option>
                                    @foreach($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="star-review col-sm-12 col-lg-6">
                                <label class="mb-3" for="radioRecommend">Вы бы порекомендовали это агентство? *</label>
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="recommend" value="yes" class="me-2 js-yes" required> Да
                                </label>
                                <label class="d-flex align-items-center">
                                    <input type="radio" name="recommend" value="no" class="me-2 js-no"> Нет
                                </label>
                            </div>

                        </div>
                    </div>
                </form>

                <!-- 3-Forma: Personal Information -->
                <form class="personal-information" style="display: none;">
                    @csrf
                    <div class="texts-top">
                        <h3>Расскажите нам больше о себе</h3>
                        <p>Мы используем эту информацию только для подтверждения подлинности вашего отзыва.</p>
                    </div>
                    <div class="row star-reviews-box pb-4">
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="fullname">
                                Полное имя *</label>
                            <input class="form-control" id="full_name" name="full_name" type="text" placeholder="Укажите ваше имя"
                                   style="background-color: #F6F6F5;">
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="fullname">
                                Электронная почта *</label>
                            <input class="form-control" id="email" name="email" type="text"
                                   placeholder="Укажите ваш электронный адрес"
                                   style="background-color: #F6F6F5;">
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="fullname">
                                Должность *</label>
                            <input class="form-control" id="job_title" name="job_title" type="text"
                                   placeholder="Укажите вашу должность"
                                   style="background-color: #F6F6F5;">
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="fullname">
                                Название компании *</label>
                            <input class="form-control" id="company_name" name="company_name" type="text"
                                   placeholder="Укажите название вашей компании"
                                   style="background-color: #F6F6F5;">
                        </div>
                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="company_industry">
                                Сфера деятельности компании (необязательно)
                            </label>
                            <select class="form-control" id="company_industry" name="company_industry"
                                    style="width:50%;">
                                <option value="" disabled selected>Выберите отрасль, в которой работает ваша компания.</option>
                                <option value="Technology">Technology</option>
                                <option value="Financial Services">Financial Services</option>
                                <option value="Healthcare">Healthcare</option>
                                <option value="Education">Education</option>
                                <option value="Construction">Construction</option>
                                <option value="Food">Food</option>
                            </select>
                        </div>

                        <div class="form-group col-lg-6 col-sm-12">
                            <label for="company_size">
                                Размер компании (необязательно)
                            </label>
                            <select class="form-control" id="company_size" name="company_size" style="width: 50%;">
                                <option value="" disabled selected>Выберите размер вашей компании.</option>
                                <option value="1-10">1-10</option>
                                <option value="11-50">11-50</option>
                                <option value="51-200">51-200</option>
                            </select>
                        </div>
                        <div>
                            <input type="hidden" name="provider_id" id="provider_id" value="{{$provider->id}}"
                                   required>
                        </div>
                </form>
            </div>

            <!-- Tugmalar -->
            <div class="bottom-of-box">
                <button class="prev-btn btn btn-black btn-rounded" style="color: #fff !important; display: none;" onclick="prevForm()">Предыдущий</button>
                <button class="next-btn btn btn-brand-4-medium" onclick="nextForm()"> Следующий <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>
        </section>

    </main>


    <script>

        document.addEventListener('DOMContentLoaded', () => {
            // Har bir form uchun star review funksiyasini chaqiramiz
            handleStarReview('budget-review', 'burget_score');
            handleStarReview('quality-review', 'quality_score');
            handleStarReview('schedule-review', 'schedule_score');
            handleStarReview('colloboration-review', 'colloboration_score');
        });

        function handleStarReview(reviewId, inputId) {
            const starButtons = document.querySelectorAll(`#${reviewId} .star-button`);
            const scoreInput = document.getElementById(inputId);

            starButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    const score = index + 1;


                    // Tanlangan yulduzlarni yangilash (faqat tanlanganlar faol bo'ladi)
                    starButtons.forEach((btn, i) => {
                        if (i < score) {
                            btn.classList.add('active'); // Faol yulduzlar
                        } else {
                            btn.classList.remove('active'); // Passiv yulduzlar
                        }
                    });

                    // Qiymatni yashirin inputga o'rnatish
                    scoreInput.value = score;
                });
            });
        }

    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">

@endsection
