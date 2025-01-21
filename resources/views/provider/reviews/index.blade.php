@extends('provider.layouts.layout')

@section('content')
    <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">
            <!-- [ Content Sidebar ] start -->

            <!-- [ Content Sidebar  ] end -->
            <!-- [ Main Area  ] start -->
            <style>
                textarea {
                    resize: none;
                }
            </style>
            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="card-header">
                        <h5 class="card-title text-black">Отзывы</h5>
                    </div>
                    {{-- <div class="page-header-right ms-auto">
                        <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                            <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                               data-bs-target="#reviewProviderOffcanvas">
                                <i class="feather-plus me-2"></i>
                                <span>Добавить новый</span>
                            </a>
                        </div>
                    </div> --}}
                </div>
                <div class="content-area-body p-3">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-0">
                        <div class="card-body">
                            <!--! BEGIN: [Users] !-->
                            <div class="card stretch stretch-full">

                                <div class="card-body custom-card-action p-3">
                                    <table class="table " id="reviewsList">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Имя клиента') }}</th>
                                                <th>{{ __('Рейтинг') }}</th>
                                                <th>{{ __('Опубликовано в') }}</th>
                                                <th class="text-end">{{ __('Настройки') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($reviews as $review)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('reviews.show', $review->id) }}"
                                                            class="hstack gap-3">
                                                            <div>
                                                                <span
                                                                    class="text-truncate-1-line">{{ $review->full_name }}</span>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <div class="rate-reviews-small">
                                                            @for ($i = 0; $i < 5; $i++)
                                                                <span>
                                                                    <img src="{{ asset('/assets/imgs/template/icons/star.svg') }}"
                                                                        alt="jobhub"
                                                                        style="opacity: {{ $i < floor($review->average_score) ? '1' : '0.2' }};" />
                                                                </span>
                                                            @endfor
                                                            <span class="ml-10 text-muted text-small">
                                                                ({{ number_format($review->average_score, 1) }})
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td><a href="">{{ $review->created_at->format('d.m.Y') }}</a>
                                                    </td>

                                                    <td>
                                                        <div class="hstack gap-2 justify-content-end">
                                                            {{-- <a href="javascript:void(0)" class="avatar-text avatar-md"
                                                                data-bs-toggle="offcanvas"
                                                                data-bs-target="#editReviewProviderOffcanvas{{ $review->id }}">
                                                                <i class="feather feather-edit-3"></i>
                                                            </a> --}}
                                                            <a href="{{ route('reviews.show', $review->id) }}"
                                                                class="avatar-text avatar-md">
                                                                <i class="feather feather-eye"></i>
                                                            </a>
                                                            <!-- Delete Button -->
                                                            {{-- <form class="avatar-text avatar-md" method="POST"
                                                                onsubmit="confirmDelete(event)"
                                                                action="{{ route('reviews.destroy', $review->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn text-dark p-0 border-0"
                                                                    style="background: none;">
                                                                    <i class="feather feather-trash-2"></i>
                                                                </button>
                                                            </form> --}}
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <!--! END: [Users] !-->
                        </div>
                    </div>
                </div>

            </div>
            <!-- [ Content Area ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
    @include('provider.components.reviews.provider-review-modal')
    @include('provider.components.reviews.provider-review-edit-modal')
    {{-- @include('admin.components.reviews.provider-review-view-modal') --}}


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
