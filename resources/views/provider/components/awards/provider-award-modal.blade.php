<?php
use App\Models\Portfolio;
use App\Models\ProviderCompany;
// Get the provider's company
$providerCompany = ProviderCompany::where('provider_id', Auth::user()->id)->first();

if ($providerCompany) {
    // Get all providers for this company
    $providerIds = ProviderCompany::where('company_id', $providerCompany->company_id)
        ->pluck('provider_id');

    // Get the latest team info for all providers in the company
    $portfolios = Portfolio::whereIn('provider_id', $providerIds)->orderBy('id', 'DESC')
    ->paginate(20);;
} else {
    // If the provider is not associated with any company, return an empty collection
    $portfolios = collect();
}
?>
<form action="{{ route('awards.store') }}" method="POST">
    @csrf
    <!-- Modal HTML form -->
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="awardProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
            </div>
            <button type="submit" class="btn btn-primary" id="save-btn">Сохранять</button>
        </div>
        <div class="offcanvas-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label for="awardName" class="form-label">Название награды</label>
                        <input name="name" id="awardName" class="form-control" placeholder="Введите название вашей награды здесь..." required>
                    </div>
                </div>


                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label for="awardDate" class="form-label">Дата</label>
                        <input type="month" id="awardDate" name="date" class="form-control" required>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Ссылка на существующую работу (необязательно):</label>
                            <input type="text" name="link" id="link" class="form-control" placeholder="Ссылка " required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Загрузить
                            изображение:</label>
                            <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                </div>
            </div>
            <input type="hidden" name="provider_id" value="{{ auth()->user()->id }}">
        </div>
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const saveBtn = document.getElementById('save-btn')
        const form = document.querySelector("form");
        const inputs = form.querySelectorAll("form-control");
        saveBtn.disabled = true;
        function checkFields() {
            let allFilled = Array.from(inputs).every(input => {
                if (input.type === "file") {
                    return input.files && input.files.length > 0;
                }
                return input.value.trim() !== "";
            });

            submitButton.disabled = !allFilled;
        }
        inputs.forEach(input => {
            input.addEventListener("input", checkFields);
            if (input.type === "file") {
                input.addEventListener("change", checkFields);
            }
        });
        checkFields();
    });
</script>





