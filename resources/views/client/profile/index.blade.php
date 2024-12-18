@extends('client.layouts.layout')

@section('content')
    <form action="{{ route('client.profile.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="nxl-content without-header nxl-full-content">
            <div class="main-content d-flex">
                <div class="content-area" data-scrollbar-target="#psScrollbarInit">

                    <div class="content-area-header bg-white sticky-top ">
                        <div class="page-header-right ms-auto">
                            <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                                <button type="submit" class="btn btn-primary">
                                    <i class="feather-refresh-cw me-2"></i>
                                    <span>Обновить</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="content-area-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class=" mb-0">

                            <div class="row">
                                <div class="col-xxl-4 col-xl-6">
                                    <div class="card stretch stretch-full">
                                        <div class="card-body">
                                            <div class="mb-4 text-center">
                                                <div class="wd-150 ht-150 mx-auto mb-3 position-relative">
                                                    <div
                                                        class="avatar-image wd-150 ht-150 border border-5 border-gray-3 position-relative">
                                                        <img id="avatarPreview"
                                                        src="{{ $client->logo ? asset('storage/' . $client->logo) : asset('assets/imgs/dora/admin-default/logo.webp') }}" alt="{{ old('name', $client->name) }}"
                                                        style="height: 18em; width: 100%; object-fit: cover;"
                                                            class="img-fluid" />
                                                    </div>
                                                    <div class="wd-10 ht-10 text-success rounded-circle position-absolute translate-middle"
                                                        style="top: 68%; right: 18px">
                                                        <label for="logoInput" class="overflow-hidden">
                                                            <i class="fa-solid fa-pen-to-square border rounded-circle p-3 bg-light"
                                                                style="cursor: pointer;"></i>
                                                            <input type="file" class="form-control" id="logoInput"
                                                                name="logo" style="opacity: 0; visibility: hidden;"
                                                                accept="image/*">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="mb-4">

                                                    <a href="javascript:void(0);" class="fs-14 fw-bold d-block">
                                                        {{ old('name', $client->name) }}</a>
                                                    <a href="javascript:void(0);"
                                                        class="fs-12 fw-normal text-muted d-block">{{ old('email', $client->email) }}</a>
                                                </div>

                                            </div>
                                            <ul class="list-unstyled mb-4">
                                                <li class="hstack justify-content-between mb-4">
                                                    <span class="text-muted fw-medium hstack gap-3"><i
                                                            class="feather-phone"></i>Телефон</span>
                                                    <a href="javascript:void(0);"
                                                        class="float-end">{{ old('tagline', $client->phone_number) }}</a>
                                                </li>

                                                <li class="hstack justify-content-between mb-4">
                                                    <span class="text-muted fw-medium hstack gap-3"><i
                                                            class="feather-mail"></i>Электронная почта</span>
                                                    <a href="javascript:void(0);"
                                                        class="float-end">{{ old('email', $client->email) }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-8 col-xl-6">
                                    <div class="card border-top-0">

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active p-4" id="overviewTab" role="tabpanel">
                                                <div class="about-section mb-5">
                                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                                        <h5 class="fw-bold mb-0">
                                                            О нас: {{ old('name', $client->name) ?: 'Kompaniya' }}
                                                        </h5>
                                                    </div>
                                                </div>
                                                <div class="profile-details mb-5">
                                                    <div class="mb-4 d-flex align-items-center justify-content-between">
                                                        <h5 class="fw-bold mb-0">Профиль:</h5>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Полное имя:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="nameInput"
                                                                placeholder="Полное имя" name="name"
                                                                value="{{ old('name', $client->name) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Вид деятельности:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="taglineInput"
                                                                placeholder="Вид деятельности" name="type_of_activity"
                                                                value="{{ old('type_of_activity', $client->type_of_activity) }}">
                                                        </div>
                                                    </div>
                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">Название организации:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="taglineInput"
                                                                placeholder="Название организации" name="organization_name"
                                                                value="{{ old('organization_name', $client->organization_name) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4">
                                                        <div class="col-sm-6 text-muted">номер телефона:</div>
                                                        <div class="col-sm-6 fw-semibold">
                                                            <input type="text" class="form-control" id="addressInput"
                                                                placeholder="номер телефона" name="phone_number"
                                                                value="{{ old('phone_number', $client->phone_number) }}">
                                                        </div>
                                                    </div>

                                                    <div class="row g-0 mb-4 providerSubmit" id="providerSubmit"
                                                        style="display: none;">
                                                        <button type="submit" class="btn btn-primary">Сохранять</button>
                                                    </div>

                                                </div>
                                                <div class="alert alert-dismissible mb-4 p-4 d-flex alert-soft-warning-message profile-overview-alert d-none"
                                                    role="alert">
                                                    <div class="me-4 d-none d-md-block">
                                                        <i class="feather feather-alert-triangle fs-1"></i>
                                                    </div>
                                                    <div>
                                                        <p class="fw-bold mb-1 text-truncate-1-line">Вы должны регулярно поддерживать свою учетную запись</p>
                                                        <p class="fs-10 fw-medium text-uppercase text-truncate-1-line">
                                                            Последнее обновление: <strong>31 Avg, 2024</strong></p>
                                                        <a href="javascript:void(0);"
                                                            class="btn btn-sm bg-soft-warning text-warning d-inline-block">Читать далее</a>
                                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                            aria-label="Close"></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
