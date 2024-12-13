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
<!-- Modal HTML form -->
<div class="offcanvas offcanvas-end w-50" tabindex="-1" id="awardProviderOffcanvas">
    <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
        <div class="d-flex align-items-center">
            <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
            <span class="vr text-muted mx-4"></span>
            <a href="javascript:void(0);">
                <h2 class="fs-14 fw-bold text-truncate-1-line">Награды</h2>
            </a>
        </div>
    </div>
    <div class="offcanvas-body">
        <form action="{{ route('awards.store') }}" method="POST">
            @csrf
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
                        <input type="month" id="awardDate" name="date" class="form-control" >
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group mb-4">
                        <label class="form-label">Ссылка на существующую работу (необязательно):</label>
                            <input name="link" id="link" class="form-control" placeholder="Ссылка " required>  
                    </div>
                </div>
            </div>
            <input type="hidden" name="provider_id" value="{{ auth()->user()->id }}">
            <button type="submit" class="btn btn-primary">Сохранять</button>
        </form>
    </div>
</div>
