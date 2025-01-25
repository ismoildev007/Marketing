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
@foreach($awards as $award)
    <form action="{{ route('awards.update', $award->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="awardEditProviderOffcanvas{{$award->id}}">
            <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
                <div class="d-flex align-items-center">
                    <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
                    <span class="vr text-muted mx-4"></span>
                </div>
                <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group mb-4">
                            <label for="awardName" class="form-label">Название награды</label>
                            <input id="awardName" class="form-control" name="name" placeholder="Введите название награды..." value="{{ old('name', $award->name) }}" required>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group mb-4">
                            <label for="awardDate" class="form-label">Дата</label>
                            <input type="month" id="awardDate" name="date" class="form-control" value="{{ old('date', $award->date->format('Y-m')) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mb-4">
                            <label for="portfolioLink" class="form-label">Ссылка на существующую работу (необязательно):</label>
                            <input id="link" class="form-control" name="link" placeholder="Ссылка" value="{{ old('link', $award->link) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group mb-4">
                            <label class="form-label">Загрузить
                                изображение:</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <img src="{{ asset('storage/' . $award->image) }}" alt="" style="width: 250px;height: 250px;">
                    </div>
                </div>
                <input type="hidden" name="provider_id" value="{{ auth()->user()->id }}">
            </div>
        </div>
    </form>
@endforeach
