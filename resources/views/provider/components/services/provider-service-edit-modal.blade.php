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

    input.custom-price:checked~.custom-price2 {
        outline: none;
        border: 1px dashed #17c666;
        transition: border .3s;
    }

    input.custom-price~.custom-price2 {
        box-shadow: none;
        border-radius: 5px;
        border: 1px dashed #dcdee4;
        transition: all .3s ease;
    }
</style>

@foreach ($services as $service)
    <form action="{{ route('service.update', $service->id) }}" method="post">
        @csrf
        @method('PUT')
        <!-- Modal for Editing Service -->
        <div class="offcanvas offcanvas-end w-50" id="editServiceModal{{ $service->id }}" tabindex="-1">
            <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
                <div class="d-flex align-items-center">
                    <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                        data-bs-toggle="tooltip" data-bs-trigger="hover" title="Close">
                        <i class="feather-arrow-left"></i>
                    </div>
                    <span class="vr text-muted mx-4"></span>
                </div>
                <button type="submit" class="btn btn-primary btn-submit">Обновлять</button>
            </div>
            <div class="offcanvas-body">

                <div class="row">
                    <!-- Service Type Selection -->
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Тип услуги:</label>
                            <select name="service_sub_category_id" id="edit-service-type-{{ $service->id }}"
                                class="form-control select2">
                                @foreach ($serviceTypes as $serviceType)
                                    <option value="{{ $serviceType->id }}"
                                        {{ $serviceType->id == $service->service_sub_category_id ? 'selected' : '' }}>
                                        {{ $serviceType->name_ru }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Skills -->
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Навыки:</label>
                            <select name="skills[]" id="edit-skills-list-{{ $service->id }}"
                                class="form-select form-control max-select" data-select2-selector="tag" multiple>
                                @foreach ($skills as $skill)
                                    <option value="{{ $skill->id }}"
                                        {{ in_array($skill->id, $service->skills->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $skill->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Starting Price -->
                    <div class="col-sm-12 col-lg-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Начальная цена:</label>
                            <div class="row mt-2">
                                @foreach ([1000, 2000, 5000, 10000] as $price)
                                    <div class="col d-flex align-items-center">
                                        <label for="edit-price-{{ $price }}-{{ $service->id }}"
                                            class="d-flex align-items-center w-100">
                                            <!-- Use the actual price value here instead of $service->price -->
                                            <input hidden class="temporaryDisabledIn card-input-element" type="radio"
                                                id="edit-price-{{ $price }}-{{ $service->id }}" name="price"
                                                value="{{ $price }}"
                                                {{ $service->price == $price ? 'checked' : '' }}>
                                            <span
                                                class="card card-body d-flex flex-row justify-content-between align-items-center p-3">
                                                <span class="d-block fs-13 fw-bold text-dark text-nowrap">$
                                                    {{ $price }}</span>
                                            </span>
                                        </label>
                                    </div>
                                @endforeach
                                <div class="col d-flex align-items-start">
                                    <label for="edit-custom-price-{{ $service->id }}"
                                        class="d-flex align-items-center w-100">
                                        <input hidden class="custom-price" type="radio"
                                            id="edit-custom-price-{{ $service->id }}" name="price" value="custom"
                                            {{ !in_array($service->price, [1000, 2000, 5000, 10000]) ? 'checked' : '' }}>
                                        <input style="width: 100px" type="number"
                                            class="ms-2 p-1 custom-price2 bg-transparent p-3" name="custom_price"
                                            id="edit-custom-price-input-{{ $service->id }}"
                                            value="{{ !in_array($service->price, [1000, 2000, 5000, 10000]) ? $service->price : '' }}"
                                            placeholder="€20000" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Description -->
                    <div class="col-12">
                        <div class="form-group mb-4">
                            <label class="form-label">Описание (необязательно):</label>
                            <textarea class="form-control" name="description" style="height: 18em;">{{ $service->description }}</textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" value="{{ auth()->user()->id }}" name="provider_id">
            </div>
        </div>
    </form>
@endforeach

<script>
    $(document).ready(function() {
        // When the service type dropdown changes, load related skills
        $('select[id^="edit-service-type-"]').on('change', function() {
            const serviceId = $(this).attr('id').split('-').pop();
            const selectedServiceTypeId = $(this).val(); // Get the selected service type ID
            const skillsList = $(`#edit-skills-list-${serviceId}`); // Get the related skills dropdown

            // Make an AJAX call to the route '/services/{id}/skills' using the selected service type ID
            $.ajax({
                url: `/api/services/${selectedServiceTypeId}/skills`, // Use the service type ID in the URL
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    skillsList.empty(); // Clear the existing skills

                    if (Array.isArray(data)) {
                        // Populate the skills dropdown with the fetched skills
                        data.forEach(function(skill) {
                            const option = $('<option></option>').val(skill.id)
                                .text(skill.name);
                            skillsList.append(option);
                        });

                        // If any skills were previously selected for the service, mark them as selected
                        const selectedSkills = skillsList.data('selected-skills') || [];
                        skillsList.val(selectedSkills).trigger('change');
                    } else {
                        console.error('Unexpected data format:', data);
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching skills:', textStatus, errorThrown);
                }
            });
        });

        // Trigger change event on page load to prepopulate skills for all existing services
        $('select[id^="edit-service-type-"]').each(function() {
            $(this).trigger('change');
        });

        // Handle enabling/disabling custom price input
        $('input[name="price"]').on('change', function() {
            const serviceId = $(this).attr('id').split('-').pop();
            const customPriceInput = $(`#edit-custom-price-input-${serviceId}`);

            if ($(this).val() === 'custom') {
                customPriceInput.prop('disabled', false);
            } else {
                customPriceInput.prop('disabled', true);
            }
        });

        // Initially trigger price logic for existing values
        $('input[name="price"]').each(function() {
            const serviceId = $(this).attr('id').split('-').pop();
            const customPriceInput = $(`#edit-custom-price-input-${serviceId}`);

            if ($(this).val() === 'custom' && $(this).is(':checked')) {
                customPriceInput.prop('disabled', false);
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
