@extends('provider.layouts.layout')

@section('content')


    <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">
            <!-- [ Content Sidebar ] start -->

            <!-- [ Content Sidebar  ] end -->
            <!-- [ Main Area  ] start -->

            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="card-header">
                        <h5 class="card-title text-black">Портфель</h5>
                    </div>
                    <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">

                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                                data-bs-target="#portfolioProviderOffcanvas">
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
                            <!--! BEGIN: [Portfolio] !-->
                            <div class="card stretch stretch-full">
                                <div class="card-body custom-card-action">
                                    <table class="table" id="portfolioList">
                                        <thead>
                                            <tr>
                                                <th>Иш Номи</th>
                                                <th>Ссылка</th>
                                                <th class="text-end">Настройки</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($portfolios as $index => $portfolio)
                                                <tr>
                                                    <td>
                                                        <a href="javascript:void(0);" 
                                                        data-bs-toggle="offcanvas"
                                                        data-bs-target="#portfolioProviderEditOffcanvas{{ $portfolio->id }}"
                                                        class="text-truncate-1-line">
                                                            {{ $portfolio->work_title }}
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ $portfolio->source_link ?? '#' }}" target="_blank">
                                                            {{ $portfolio->source_link ?? '---' }}
                                                        </a>
                                                    </td>

                                                    <td>
                                                        <div class="hstack gap-2 justify-content-end">
                                                            <!-- Edit Button -->
                                                            <a href="javascript:void(0);" class="avatar-text avatar-md" data-bs-toggle="offcanvas"
                                                            data-bs-target="#portfolioProviderEditOffcanvas{{ $portfolio->id }}">
                                                                <i class="feather feather-edit-3"></i>
                                                            </a>

                                                            <!-- Delete Button -->
                                                            <form method="POST" 
                                                                onsubmit="confirmDelete(event)"
                                                                action="{{ route('portfolios.destroy', $portfolio->id) }}">
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

                                <!-- Footer для кнопки добавления нового портфеля -->
                                <a href="javascript:void(0);" 
                                class="card-footer fs-11 fw-bold text-uppercase text-center d-none"
                                data-bs-toggle="offcanvas" data-bs-target="#portfolioProviderOffcanvas">
                                    Добавить новый
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

    @include('provider.components.portfolios.provider-portfolio-modal', ['services' => $services])
    @include('provider.components.portfolios.provider-portfolio-edit-modal', $portfolios)
    @include('provider.components.portfolios.provider-portfolio-view-modal')



    <script>
        function confirmDelete(event) {
            event.preventDefault();
            var num1 = Math.floor(Math.random() * 10) + 1;
            var num2 = Math.floor(Math.random() * 10) + 1;
            var correctAnswer = num1 + num2;

            Swal.fire({
                title: 'Matematik amalni bajaring',
                text: `${num1} + ${num2} = ?`,
                input: 'text',
                inputPlaceholder: 'Javobni kiriting',
                showCancelButton: true,
                confirmButtonText: 'Tasdiqlash',
                cancelButtonText: 'Bekor qilish',
                preConfirm: (answer) => {
                    if (parseInt(answer) === correctAnswer) {
                        return true;
                    } else {
                        Swal.showValidationMessage(
                            'Notog\'ri javob. O\'chirish uchun to\'g\'ri javob kiritilishi kerak.'
                        );
                        return false;
                    }
                }
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'O\'chirishni tasdiqlaysizmi?',
                        text: "Bu amalni bekor qilib bo'lmaydi!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ha, o\'chirilsin!',
                        cancelButtonText: 'Bekor qilish'
                    }).then((result) => {
                        if (result.value) {
                            event.target.submit();
                        }
                    });
                }
            });
        }
    </script>

@endsection
