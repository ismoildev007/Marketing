<form action="{{ route('managers.store') }}" method="POST">
    @csrf
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="managerProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas"
                    data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i
                        class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
            </div>
            <h3 class="mb-0">менеджер</h3>
            <div class="d-none d-md-flex gap-1 align-items-center justify-content-center">
                <div class="comments">
                    <button disabled id="submitButton" href="javascript:void(0);"
                        class="btn btn-primary d-inline-block">Добавить менеджера</button>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="offcanvas-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <div id="taskDateRange">
                        <label class="form-label">Имя менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="text" class="form-control" name="name" id="nameInput"
                                placeholder="Напишите имя поставщика" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="taskDateRange">
                        <label class="form-label">Электронная почта менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="text" class="form-control" name="email" id="emailInput"
                                placeholder="Написать письмо поставщику" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="taskDateRange">
                        <label class="form-label">Пароль менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="password" class="form-control" name="password" id="passwordInput"
                                placeholder="Написать письмо поставщику" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="company_id" value="{{ $company->id }}">
            <!--! END: Comments !-->
        </div>
    </div>
</form>
<script>
    // Inputs and button
    const nameInput = document.getElementById('nameInput');
    const emailInput = document.getElementById('emailInput');
    const passwordInput = document.getElementById('passwordInput');
    const submitButton = document.getElementById('submitButton');

    // Function to check inputs and toggle button
    function toggleButtonState() {
        const isNameFilled = nameInput.value.trim() !== '';
        const isEmailFilled = emailInput.value.trim() !== '';
        const isPasswordFilled = passwordInput.value.trim() !== '';

        // Enable button if all inputs are filled, disable otherwise
        submitButton.disabled = !(isNameFilled && isEmailFilled && isPasswordFilled);
    }

    // Add event listeners to inputs
    [nameInput, emailInput, passwordInput].forEach(input => {
        input.addEventListener('input', toggleButtonState);
    });
</script>
