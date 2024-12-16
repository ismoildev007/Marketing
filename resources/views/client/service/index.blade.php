@extends('client.layouts.layout')

@section('content')
    <div class="nxl-content">
        <!-- Заголовок страницы -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Список Лотов</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/admin/dashboard">Главная</a></li>
                    <li class="breadcrumb-item">Лоты</li>
                </ul>
            </div>

            <div class="page-header-right ms-auto">
                <div class="page-header-right-items">
                    <a href="{{ route('lots.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Добавить новый лот</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Конец Заголовка страницы -->

        <!-- Основное содержимое -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card stretch stretch-full">
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover" id="lotsList">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Название лота</th>
                                        <th>Описание</th>
                                        <th>Цена</th>
                                        <th>Статус</th>
                                        <th class="text-end">Настройки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($lots as $lot)
                                        <tr>
                                            <td>{{ $lot->id }}</td>
                                            <td>{{ $lot->title }}</td>
                                            <td>{{ $lot->description }}</td>
                                            <td>{{ $lot->budget_min }} - {{ $lot->budget_max }}</td>
                                            <td>{{ $lot->status }}</td>
                                            <td class=" d-flex justify-content-end">
                                                <div class="hstack gap-2">
                                                    <a href="{{ route('lots.edit', $lot->id) }}" class="avatar-text avatar-md">
                                                        <i class="feather-edit"></i>
                                                    </a>
                                                    <form class="dropdown-item" action="{{ route('lots.destroy', $lot->id) }}" method="POST" onsubmit="event.preventDefault(); showDeleteModal(this);">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn" style="background: none; border: none; padding: 0; color: black;">
                                                            <i class="feather feather-trash-2 me-3"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Навигация по страницам -->
            <div class="row justify-content-center mt-4">
                <div class="">
                    {{ $lots->links() }}
                </div>
            </div>
        </div>
        <!-- Конец Основного содержимого -->
    </div>
@endsection
