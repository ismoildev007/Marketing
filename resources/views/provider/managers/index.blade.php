@extends('provider.layouts.layout')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .swal2-cancel {
            background-color: red !important;
            color: #fff !important;
        }

        .swal2-confirm {
            color: #6c757d !important;
            border-color: #6c757d !important;
            background-color: transparent !important;

            display: inline-block;
            font-weight: 400;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>


    <div class="nxl-content without-header nxl-full-content">
        <!-- [ Main Content ] start -->
        <div class="main-content d-flex">
            <!-- [ Content Sidebar ] start -->

            <!-- [ Content Sidebar  ] end -->
            <!-- [ Main Area  ] start -->
            <div class="content-area" data-scrollbar-target="#psScrollbarInit">
                <div class="content-area-header bg-white sticky-top">
                    <div class="card-header">
                        <div class="">
                            <h5 class="card-title text-black">Mенеджера</h5>
                            <small>Profilda o’z jamoangizni yarating</small>
                        </div>
                    </div>
                    <div class="page-header-right ms-auto">
                        @if (auth()->user()->role_id == 2)
                            <div class="d-flex align-items-center gap-3 page-header-right-items-wrapper">
                                <a href="javascript:void(0);" class="btn btn-primary" data-bs-toggle="offcanvas"
                                    data-bs-target="#managerProviderOffcanvas">
                                    <i class="feather-plus me-2"></i>
                                    <span>Добавить Mенеджер</span>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="content-area-body p-3">
                    <div class="card mb-0">
                        <div class="card-body p-3">
                            <!--! BEGIN: [Users] !-->
                            <div class=" stretch stretch-full mb-0">
                                <div class="table-responsive">
                                    <table class="table " id="managersList">
                                        <thead>
                                            <tr>
                                                <th>Имя</th>
                                                <th>Электронная почта</th>
                                                <th>Роль</th>
                                                <th class="text-end">{{ __('Настройки') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($managers as $manager)
                                                <tr data-id="{{ $manager->id }}">
                                                    <td>{{ $manager->name }}</td>
                                                    <td>{{ $manager->email }}</td>
                                                    <td>{{ $manager->role->name }}</td>
                                                    @if (auth()->user()->role_id == 2)
                                                        <td>
                                                            <div class="hstack gap-2 justify-content-end">
                                                                <a class="avatar-text avatar-md" href="javascript:void(0);"
                                                                    data-bs-toggle="offcanvas"
                                                                    data-bs-target="#managerEditProviderOffcanvas{{ $manager->id }}">
                                                                    <i class="feather feather-edit-3 "></i>
                                                                </a>
                                                                <form class="avatar-text avatar-md delete-button"
                                                                    onsubmit="confirmDelete(event)"
                                                                    action="{{ route('managers.destroy', $manager->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn text-dark p-0 border-0"
                                                                        style="background: none;">
                                                                        <i class="feather feather-trash-2 "></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="text-center text-muted">
                                                        <em>Нет данных</em> <!-- This is the "No data available" message -->
                                                    </td>
                                                </tr>
                                            @endforelse
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





    @include('provider.components.managers.provider-manager-modal')
    @include('provider.components.managers.edit-provider-manager-modal', $managers)


    @include('provider.components.managers.view-provider-manager-modal')

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.dropdown-item[data-bs-target="#managerEditProviderOffcanvas"]').forEach(
                button => {
                    button.addEventListener('click', () => {
                        const managerId = button.closest('tr').dataset.id;
                        document.getElementById('editManagerForm').action =
                            `https://marketing.dora.uz/provider/managers/${managerId}/edit`;
                        document.getElementById('forGetId').value = managerId;


                    });
                });
        });


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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
