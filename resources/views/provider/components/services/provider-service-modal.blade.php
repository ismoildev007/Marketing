<style>
    .select2-selection__rendered .select2-selection__choice {
        width: max-content;
    }

    textarea {
        resize: none;
    }

    .fs-15 {
        font-size: 15px !important;
    }

    .card:hover {
        transform: translateY(0px) !important;
        box-shadow: none !important;
    }

    .card-input-element:checked+.card::after {
        font-size: 12px !important;
    }
</style>


<!--! ================================================================ !-->
<!--! [Start] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
<form action="{{ route('service.store') }}" method="post">
    @csrf
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="serviceProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Close">
                    <i class="feather-arrow-left"></i>
                </div>
                <span class="vr text-muted mx-4"></span>
            </div>
            <button disabled="disabled" id="service_btn" class="btn btn-primary btn-submit" type="submit">Представлять
                на рассмотрение</button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <!-- Service Type Selection -->
                <div class="col-sm-12 col-lg-12">
                    <div class="form-group mb-4">
                        <label class="fs-15 form-label">Тип услуги:</label>

                        <select name="service_sub_category_id" id="service-type" class="form-control select2">
                            <option value="" selected disabled hidden>Выберите услугу</option>
                            @foreach ($serviceTypes as $service)
                                <option value="{{ $service->id }}">{{ $service->name_ru }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-12">
                    <div style="opacity: 0.5" class="form-group mb-4 temporaryDisabled">
                        <label class="fs-15 form-label ">Навыки:</label>

                        <select disabled="disabled" name="skills[]" id="skills-list"
                            class="temporaryDisabledIn form-select form-control max-select" data-select2-selector="tag"
                            multiple>
                            <!-- Skills will be dynamically loaded here -->
                        </select>
                    </div>
                </div>

                <!-- Starting Price -->
                <div class="col-sm-12 col-lg-12">
                    <div style="opacity: 0.5" class="form-group mb-4 temporaryDisabled">
                        <label class="fs-15 form-label">Начальная цена:</label> <br>
                        <small>Укажите минимальную стоимость, с которой начинается предоставление этой услуги. Это
                            поможет клиентам сразу понять, подходят ли им условия сотрудничества</small>
                        <div class="row mt-2">

                            <div class="col d-flex align-items-center">
                                <label for="price-1000" class="d-flex align-items-center w-100">
                                    <input hidden disabled="disabled" class="temporaryDisabledIn card-input-element"
                                        type="radio" id="price-1000" name="price" value="1000">
                                    <span
                                        class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                        <span class="d-block fs-13 fw-bold text-dark">$1000</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-2000" class="d-flex align-items-center w-100">
                                    <input hidden disabled="disabled" class="temporaryDisabledIn card-input-element" type="radio" id="price-2000"
                                        name="price" value="2000">
                                    <span
                                        class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                        <span class="d-block fs-13 fw-bold text-dark">$2000</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-5000" class="d-flex align-items-center w-100">
                                    <input hidden disabled="disabled" class="temporaryDisabledIn card-input-element" type="radio" id="price-5000"
                                        name="price" value="5000">
                                    <span
                                        class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                        <span class="d-block fs-13 fw-bold text-dark">$5000</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="price-10000" class="d-flex align-items-center w-100">
                                    <input hidden disabled="disabled" class="temporaryDisabledIn card-input-element" type="radio" id="price-10000"
                                        name="price" value="10000">
                                    <span
                                        class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                        <span class="d-block fs-13 fw-bold text-dark">$10000</span>
                                    </span>
                                </label>
                            </div>
                            <div class="col d-flex align-items-center">
                                <label for="custom-price" class="d-flex align-items-center w-100">
                                    <input disabled="disabled" hidden class="temporaryDisabledIn card-input-element" type="radio" id="custom-price"
                                        name="price" value="custom">
                                    <span
                                        class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                        <span class="d-block fs-13 fw-bold text-dark"
                                            id="custom_price_org">$20000</span>
                                        <input disabled="disabled" style="width:60px;" type="number"
                                            class="temporaryDisabledIn p-0 border-0 bg-transparent d-none" id="custom-price-input"
                                            placeholder="$20000" />
                                </label>
                                </span>
                            </div>

                        </div>

                        <script>
                            document.getElementById('custom-price').addEventListener('change', function() {
                                if (this.checked) {
                                    const customPriceInput = document.getElementById('custom-price-input');
                                    const customPriceOrg = document.getElementById('custom_price_org');

                                    customPriceInput.classList.remove('d-none');
                                    customPriceOrg.classList.add('d-none');
                                    customPriceInput.focus();

                                    customPriceInput.addEventListener('blur', function() {
                                        let value = customPriceInput.value;
                                        if (value) {
                                            customPriceOrg.textContent = `$${value}`;
                                            customPriceInput.classList.add('d-none');
                                            customPriceOrg.classList.remove('d-none');
                                        }
                                    });
                                }
                            });
                        </script>

                    </div>
                </div>



                <!-- Description -->
                <div class="col-12">
                    <div style="opacity: 0.5" class="form-group mb-4 temporaryDisabled">
                        <label class="fs-15 form-label">Описание (необязательно):</label>
                        <textarea id="service_description" disabled="disabled" class="temporaryDisabledIn form-control" name="description"
                            style="height: 15em;"></textarea>
                    </div>
                </div>
            </div>
            <input type="hidden" value="{{ auth()->user()->id }}" name="provider_id">
        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        // Populate Service Type options
        const serviceTypeSelect = $('#service-type');

        $.ajax({
            url: '/api/service-lists',
            method: 'GET',
            success: function(data) {
                console.log('Service Lists Data:', data); // Check what is being returned
                if (data.status === 'success' && Array.isArray(data.data)) {
                    data.data.forEach(function(service) {
                        const option = $('<option class="text-black"></option>').val(service
                            .id).text(service.name_en);
                        serviceTypeSelect.append(option);
                    });
                } else {
                    console.error('Unexpected data format:', data);
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error fetching service types:', textStatus, errorThrown);
            }
        });

        // Populate Skills based on selected Service Type
        $('#service-type').on('change', function() {
            const selectedServiceId = $(this).val();

            $.ajax({
                url: '/api/skills',
                method: 'GET',
                success: function(data) {
                    console.log('Skills Data:', data); // Check what is being returned
                    const skillsList = $('#skills-list');
                    skillsList.empty(); // Clear existing options

                    if (Array.isArray(data)) {
                        const filteredSkills = data.filter(skill => parseInt(skill
                            .service_id) === parseInt(selectedServiceId));
                        console.log(filteredSkills);
                        filteredSkills.forEach(function(skill) {
                            console.log(skill.name_en);
                            const option = $('<option></option>').val(skill.id)
                                .text(skill.name_en);
                            skillsList.append(option);
                        });
                    } else {
                        console.error('Unexpected data format:', data);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching skills:', textStatus, errorThrown);
                }
            });
        });
    });
</script>
<script>
    document.getElementById('service-type').addEventListener('change', function() {
        const serviceId = this.value;

        // Clear the skills list
        const skillsList = document.getElementById('skills-list');
        skillsList.innerHTML = ''; // Clear current options

        // If no service is selected, return early
        if (!serviceId) {
            return;
        }

        // Fetch skills based on the selected service
        fetch(`/api/services/${serviceId}/skills`)
            .then(response => response.json())
            .then(data => {
                // Check if data is an array
                if (Array.isArray(data)) {
                    data.forEach(skill => {
                        const option = document.createElement('option');
                        option.value = skill.id;
                        option.textContent = skill.name;
                        skillsList.appendChild(option);
                    });
                } else {
                    console.error('Unexpected data format:', data);
                }
            })
            .catch(error => {
                console.error('Error fetching skills:', error);
            });
    });
</script>


<script>
    // Disable custom price input by default
    const customPriceInput = document.getElementById('custom-price-input');

    // Handle enabling and disabling of custom price input
    // document.querySelectorAll('input[name="price"]').forEach((radio) => {
    //     radio.addEventListener('change', function() {
    //         if (this.value === 'custom') {
    //             customPriceInput.disabled = false;
    //         } else {
    //             customPriceInput.disabled = true;
    //             customPriceInput.value = ''; // Reset custom input if another option is selected
    //         }
    //     });
    // });

    $(document).ready(function() {
        $('.max-select').each(function() {
            let $this = $(this);

            // Elementdan tanlangan qiymatlarni olish
            let selectedValues = $this.data('selected-skills');

            // Select2 ni o'rnatish
            $this.select2({
                tags: true,
                width: '100%',
                closeOnSelect: false,
            });

            // Tanlangan qiymatlarni qo'shish
            if (selectedValues) {
                $this.val(selectedValues).trigger('change');
            }
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const serviceTypeSelect = document.getElementById('service-type');
        const temporaryDisabledElements = document.querySelectorAll('.temporaryDisabled');
        const temporaryDisabledInElements = document.querySelectorAll('.temporaryDisabledIn');

        serviceTypeSelect.addEventListener('change', function() {
            if (serviceTypeSelect.value) {
                // Agar biror qiymat tanlangan bo'lsa
                temporaryDisabledElements.forEach(element => {
                    // element.removeAttribute('disabled', 'disabled');
                    element.style.opacity = '1';
                });
                temporaryDisabledInElements.forEach(element => {
                    element.removeAttribute('disabled',
                        'disabled'); // Agar faollashtirilishi kerak bo'lsa
                });

            } else {
                // Agar tanlanmagan bo'lsa
                temporaryDisabledElements.forEach(element => {
                    // element.setAttribute('disabled', 'disabled');
                    element.style.opacity = '0.5';
                });
                temporaryDisabledInElements.forEach(element => {
                    element.setAttribute('disabled',
                        'disabled'); // Agar faollashtirilishi kerak bo'lsa
                });

            }
        });


    });
    // document.addEventListener('DOMContentLoaded', function() {
    //     const radioButtons = document.querySelectorAll('input[name="price"]');
    //     const isSelected = Array.from(radioButtons).some(radio => radio.checked);
    //     const skillslist = document.getElementById('skills-list').value;
    //     const service_description = document.getElementById('service_description').value;
    //     const service_btn = document.getElementById('service_btn');

    //     if (isSelected && skillslist && service_description.trim()) {
    //         service_btn.removeAttribute('disabled', 'disabled')
    //     } else {
    //         service_btn.setAttribute('disabled', 'disabled')
    //     }

    // })
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="price"]');
        const skillslist = document.getElementById('skills-list');
        const service_description = document.getElementById('service_description');
        const service_btn = document.getElementById('service_btn');

        function checkInputs() {
            const isSelected = Array.from(radioButtons).some(radio => radio.checked);
            const isSkillsListFilled = skillslist.value.trim() !== '';
            const isServiceDescriptionFilled = service_description.value.trim() !== '';

            if (isSelected && isSkillsListFilled && isServiceDescriptionFilled) {
                service_btn.removeAttribute('disabled');
            } else {
                service_btn.setAttribute('disabled', 'disabled');
            }
        }

        radioButtons.forEach(radio => radio.addEventListener('change', checkInputs));
        skillslist.addEventListener('input', checkInputs);
        service_description.addEventListener('input', checkInputs);

        checkInputs();
    });
</script>
<!--! ================================================================ !-->
<!--! [End] Tasks Details Offcanvas !-->
<!--! ================================================================ !-->
