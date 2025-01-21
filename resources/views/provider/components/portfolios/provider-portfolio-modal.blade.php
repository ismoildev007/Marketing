<form action="{{ route('portfolios.store') }}" enctype='multipart/form-data' method="POST">

    @csrf
    <div class="offcanvas offcanvas-end w-75" tabindex="-1" id="portfolioProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                        class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
            </div>
            <a href="javascript:void(0);">
                <h2 class="fs-14 fw-bold text-truncate-1-line">Портфель</h2>
            </a>
            <div class=""></div>
        </div>
        @if ($errors->has('error'))
            <div class="alert alert-danger">
                {{ $errors->first('error') }}
            </div>
        @endif
        <div class="offcanvas-body">

            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <h4> Добавить работу</h4>
                        <div class="col-md-12 mt-3">
                            <h5> Название работы</h5>
                            <div class="mb-4">
                                <label class="form-label">Дайте краткое, но содержательное название своей работе. <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="work_title" class="form-control"
                                    placeholder="Введите название вашей работы здесь...">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="showcase form-group card">
                                    <h5>Изображение или видео</h5>
                                    <div id="workIllustrationsContainer">
                                        <main class="container">
                                            <div id="" class="mt-3">
                                                <div class="">
                                                    <label for="image" class="btn btn-primary w-100">Загрузить
                                                        изображение:</label>
                                                    <input type="file" name="image" hidden id="image"
                                                        accept="image/*"
                                                        class="form-control @error('image') is-invalid @enderror"
                                                        onchange="previewGalleryImages(event)">
                                                    @error('image')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                    <div class="mt-2" id="galleryPreview"></div>
                                                </div>
                                            </div>
                                        </main>

                                        <script>
                                            function showInput(type) {
                                                const input = document.getElementById('image');
                                                const container = document.getElementById('imageInput');

                                                if (type === 'image') {
                                                    container.style.display = 'block';
                                                    input.click();
                                                }
                                            }

                                            function previewGalleryImages(event) {
                                                const gallery = document.getElementById('galleryPreview');
                                                gallery.innerHTML = '';

                                                const files = Array.from(event.target.files);

                                                files.forEach((file, index) => {
                                                    const reader = new FileReader();

                                                    reader.onload = (e) => {
                                                        const imgElement = document.createElement('img');
                                                        imgElement.src = e.target.result;
                                                        imgElement.style.maxWidth = '100px';
                                                        imgElement.style.marginRight = '10px';

                                                        const removeButton = document.createElement('button');
                                                        removeButton.type = 'button';
                                                        removeButton.classList.add('btn', 'btn-danger', 'btn-sm');
                                                        removeButton.textContent = 'Remove';
                                                        removeButton.style.marginLeft = '10px';

                                                        removeButton.addEventListener('click', () => {
                                                            files.splice(index, 1);
                                                            imgElement.remove();
                                                            removeButton.remove();
                                                            updateInputFiles(files);
                                                        });

                                                        const previewItem = document.createElement('div');
                                                        previewItem.classList.add('d-inline-block', 'align-top', 'me-3');
                                                        previewItem.appendChild(imgElement);
                                                        previewItem.appendChild(removeButton);

                                                        gallery.appendChild(previewItem);
                                                    };

                                                    reader.readAsDataURL(file);
                                                });

                                                updateInputFiles(files);
                                            }

                                            function updateInputFiles(files) {
                                                const input = document.getElementById('gallery_images');
                                                const dataTransfer = new DataTransfer();

                                                files.forEach((file) => {
                                                    dataTransfer.items.add(file);
                                                });

                                                input.files = dataTransfer.files;
                                            }
                                        </script>

                                        <div class="text-dark mt-3" id="imageInputInfo" style="display: none;">
                                            Рекомендуемый размер: <b>2MB max</b>. Рекомендуемое разрешение: <b>1200x900
                                                px</b>. Пожалуйста, постарайтесь сохранить альбомную ориентацию:
                                            <b>1.3:1</b>.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h5>Экспертиза</h5>
                            <div class="form-group mb-4">
                                <label class="form-label">Укажите области знаний, требуемые для выполненной вами
                                    работы.</label>
                                <select class="form-control max-select" id="serviceSelect"
                                    name="service_sub_category_id">
                                    <option value="">Выберите услугу...</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{ $service->name_ru }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h5>Навыки <span>(необязательный)</span></h5>
                            <div class="mb-4">
                                <label class="form-label">Укажите необходимые навыки и компетенции.</label>
                                <select class="form-control max-select" id="skillsSelect" name="skills[]"
                                    multiple></select>
                            </div>
                        </div>

                        <script>
                            $(document).ready(function() {
                                // Select2ni o'rnatish
                                $('.max-select').select2({
                                    theme: 'bootstrap-5',
                                    placeholder: 'Выберите услугу...', // Placeholderni to'g'ri o'rnatish
                                    allowClear: true
                                });

                                $('#skillsSelect').select2({
                                    placeholder: "Укажите навыки и компетенции...", // Placeholder uchun to'g'ri yozish
                                    tags: true,
                                    allowClear: true
                                });

                                // ServiceSelectni o'zgartirishda AJAX orqali ma'lumot olish
                                $('#serviceSelect').on('change', function() {
                                    const serviceId = $(this).val();
                                    const skillsSelect = $('#skillsSelect');

                                    // Hech narsa tanlanmagan bo'lsa, selectni tozalash
                                    if (!serviceId) {
                                        skillsSelect.empty().trigger('change');
                                        return;
                                    }

                                    // AJAX orqali ma'lumot olish
                                    $.ajax({
                                        url: `/api/services/${serviceId}/skills`,
                                        type: 'GET',
                                        success: function(data) {
                                            skillsSelect.empty(); // Eski ma'lumotlarni o'chirish
                                            data.forEach(skill => {
                                                const newOption = new Option(skill.name, skill.id, false,
                                                    false);
                                                skillsSelect.append(newOption);
                                            });
                                            skillsSelect.trigger('change');
                                        },
                                        error: function(xhr) {
                                            console.error('Xatolik:', xhr);
                                        }
                                    });
                                });
                            });
                        </script>


                        <div class="col-md-6 mt-3">
                            <h5> Дата начала </h5>
                            <div class="mb-4">
                                <input type="date" class="form-control" name="start_date"
                                    placeholder="Введите бюджет...">
                            </div>
                        </div>
                        <div class="col-md-6 mt-3">
                            <h5> Дата окончания</h5>
                            <div class="mb-4">
                                <input type="date" class="form-control" name="end_date"
                                    placeholder="Введите бюджет...">
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h5> Бюджет <span>(необязательный) </span></h5>
                            <div class="mb-4">
                                <label class="form-label">Укажите, какой общий бюджет был выделен на выполнение этой
                                    работы.<span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" name="budget"
                                    placeholder="Введите бюджет...">
                                <label class="form-label">Конфиденциально: эта информация не будет видна публично, но
                                    поможет нам отправлять вам более точные и релевантные предложения.<span
                                        class="text-danger">*</span></label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="my-3">
                                <h5> Описание <span> (необязательный) </span></h5>
                                <label class="form-label">Опишите подробности вашего сотрудничества с клиентом по
                                    выполненной работе.</label>
                            </div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <h6> Введение</h6>
                                    <label class="form-label">В качестве введения кратко опишите выполненную работу в
                                        нескольких предложениях.</label>
                                    <textarea class="form-control" id="exampleTextarea" name="introduction" rows="5"
                                        placeholder="Введите текст здесь..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="form-group">
                                    <h6> Проблемы </h6>
                                    <label class="form-label">В качестве вступления кратко опишите выполненную работу в
                                        нескольких предложениях.</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="5" name="challenges"
                                        placeholder="Введите текст здесь..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="form-group">
                                    <h6> Решение </h6>
                                    <label class="form-label">В качестве вступления кратко опишите представленную
                                        работу в нескольких предложениях.</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="5" name="solution"
                                        placeholder="Введите текст здесь..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="form-group">
                                    <h6> Влияние</h6>
                                    <label class="form-label">В качестве вступления кратко опишите представленную
                                        работу в нескольких предложениях.</label>
                                    <textarea class="form-control" id="exampleTextarea" name="impact" rows="5"
                                        placeholder="Введите текст здесь..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3">
                            <h5> Справочная ссылка <span> (необязательный) </span></h5>
                            <div class="mb-4">
                                <label class="form-label">Укажите ссылку на результат вашего сотрудничества (например,
                                    ссылку на сайт, видео, мероприятие).</label>
                                <input type="text" class="form-control" name="source_link"
                                    placeholder="Введите ссылку на вашу работу...">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-5 sticky-column ">
                    <div class="row">
                        <h4> Клиент</h4>
                        <div class="col-md-12">
                            <div class="mb-4">
                                <div class="form-group">
                                    <h6>Название компании</h6>
                                    <input class="form-control" id="exampleTextarea" name="company_name"
                                        rows="5" placeholder="Введите текст здесь...">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-3">
                            <h6> Расположение</h6>
                            <div class="mb-4">
                                <input type="text" class="form-control" name="company_location"
                                    placeholder="Введите название вашей работы здесь...">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6> Географический охват <span> (необязательный) </span> </h6>
                            <div class="form-group mb-4">
                                <select class="form-control" data-select2-selector="status" name="geographic_scope">
                                    <option value="Local" data-bg="bg-primary" selected>Местный</option>
                                    <option value="Regional" data-bg="bg-secondary">Региональный</option>
                                    <option value="National" data-bg="bg-success">Национальный</option>
                                    <option value="International" data-bg="bg-danger">Международный</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6> Аудитория <span> (необязательный) </span> </h6>
                            <div class="form-group mb-4">
                                <select class="form-control" data-select2-selector="status" name="audience">
                                    <option value="B2B" data-bg="bg-primary" selected>B2B</option>
                                    <option value="B2C" data-bg="bg-secondary">B2C</option>
                                    <option value="B2B & B2C" data-bg="bg-success">B2B & B2C</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <h6> Попросите этого клиента оставить отзыв <span> (необязательный) </span> </h6>
                            <div class="mb-4">
                                <input type="text" class="form-control"
                                    placeholder="Введите название вашей работы здесь...">
                            </div>
                            <label> Конфиденциально: адрес электронной почты вашего клиента является конфиденциальным и
                                не будет храниться или показываться где-либо.</label>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="provider_id" value="{{ auth()->user()->id }}">
                <button class="btn btn-primary d-inline-block mt-4" type="submit">Представлять на
                    рассмотрение</button>
            </div>
        </div>
    </div>
</form>

<style>
    .sticky-column {
        position: -webkit-sticky;
        position: sticky;
        top: 0;
        height: 100vh;
        overflow: auto;
    }
</style>
