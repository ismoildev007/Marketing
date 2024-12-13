@extends('provider.layouts.layout')

@section('content')
@php
    use App\Models\ServiceSubCategory;
@endphp
   <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendors/css/select2-theme.min.css">
<div class="nxl-content without-header nxl-full-content">
    <!-- [ Main Content ] start -->
    <div class="main-content d-flex">
        <!-- [ Content Sidebar ] start -->

        <!-- [ Content Sidebar  ] end -->
        <!-- [ Main Area  ] start -->
        <div class="content-area" data-scrollbar-target="#psScrollbarInit">
            <div class="content-area-header bg-white sticky-top">
                <div class="card-header">
                    <h5 class="card-title text-black">Услуга</h5>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                        <a href="javascript:void(0);" class="btn btn-primary"
                        data-bs-toggle="offcanvas" data-bs-target="#serviceProviderOffcanvas">
                            <i class="feather-plus me-2"></i>
                            <span>Добавить новый</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="content-area-body">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-0">
        <div class="card-body">
            <!-- BEGIN: Services -->
            <div class="card stretch stretch-full">
                <div class="card-body custom-card-action">
                    <table class="table" id="serviceList">
                        <thead>
                            <tr>
                                <th>Услуга</th>
                                <th>Ссылка</th>
                                <th>Навыки</th>
                                <th class="text-end">Настройки</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($services as $index => $service)
                                @php
                                    $subCategory = ServiceSubCategory::where('id', $service->service_sub_category_id)->first();
                                @endphp
                                <tr>
                                    <td>
                                        <a href="javascript:void(0);" 
                                           data-bs-toggle="offcanvas"
                                           data-bs-target="#editServiceModal{{ $service->id }}"
                                           class="text-truncate-1-line">
                                            {{ $subCategory->name_ru ?? 'No Service List' }}
                                        </a>
                                    </td>

                                    <td>
                                        <a href="{{ $service->source_link ?? '#' }}" target="_blank">
                                            {{ $service->source_link ?? '---' }}
                                        </a>
                                    </td>

                                    <td>
                                        @if ($service->skills->isNotEmpty())
                                            @foreach ($service->skills as $skill)
                                                <span class="badge bg-secondary">{{ $skill->name_en ?? $skill->name }}</span>
                                            @endforeach
                                        @else
                                            <em>Нет навыков</em>
                                        @endif
                                    </td>

                                    <td>
                                        <div class="hstack gap-2 justify-content-end">
                                            <!-- Edit Button -->
                                            <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                               data-bs-target="#editServiceModal{{ $service->id }}">
                                                <i class="feather feather-edit-3"></i>
                                            </a>

                                            <!-- Delete Button -->
                                            <form method="POST"
                                                  onsubmit="confirmDelete(event)"
                                                  action="{{ route('service.destroy', $service->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn text-dark p-0 border-0" style="background: none;">
                                                    <i class="feather feather-trash-2"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">
                                        <em>Нет данных</em>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer для кнопки добавления новой услуги -->
                <a href="javascript:void(0);" 
                   class="card-footer fs-11 fw-bold text-uppercase text-center d-none"
                   data-bs-toggle="offcanvas"
                   data-bs-target="#addServiceModal">
                    Добавить новую услугу
                </a>
            </div>
        </div>
    </div>
</div>


        </div>
        <!-- [ Content Area ] end -->
    </div>
    <!-- [ Main Content ] end -->
</div>

@include('provider.components.services.provider-service-modal' )
@include('provider.components.services.provider-service-edit-modal',$services)

  <script src="assets/vendors/js/select2.min.js"></script>
    <script src="assets/vendors/js/select2-active.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Select2 on the Skills dropdown
        $('#skills-list').select2({
            placeholder: "Select skills",
            allowClear: true,
            theme: 'bootstrap-5'
        });
    });
</script>


@endsection
