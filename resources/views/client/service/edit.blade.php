@extends('client.layouts.layout')

@section('content')

    <!-- Основное содержимое -->
    <div class="nxl-content">
        <!-- Заголовок страницы -->
        <div class="page-header">
            <div class="page-header-left d-flex align-items-center">
                <div class="page-header-title">
                    <h5 class="m-b-10">Редактировать лот</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Главная</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('lots.index') }}">Лоты</a></li>
                    <li class="breadcrumb-item">Редактировать лот</li>
                </ul>
            </div>
        </div>
        <!-- Конец заголовка страницы -->

        <!-- Основное содержимое -->
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card border-top-0">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('lots.update', $lot->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="mb-4 col-md-4">
                                        <label for="titleInput" class="fw-semibold">Название:</label>
                                        <input type="text" class="form-control" id="titleInput" placeholder="Название лота" name="title" value="{{ $lot->title }}" required>
                                    </div>

                                    <div class="mb-4 col-md-4">
                                        <label for="budgetMinInput" class="fw-semibold">Минимальный бюджет:</label>
                                        <input type="number" class="form-control" id="budgetMinInput" placeholder="Минимальный бюджет" name="budget_min" value="{{ $lot->budget_min }}" required>
                                    </div>

                                    <div class="mb-4 col-md-4">
                                        <label for="budgetMaxInput" class="fw-semibold">Максимальный бюджет:</label>
                                        <input type="number" class="form-control" id="budgetMaxInput" placeholder="Максимальный бюджет" name="budget_max" value="{{ $lot->budget_max }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-4">
                                        <label for="deadlineInput" class="fw-semibold">Срок выполнения:</label>
                                        <input type="date" class="form-control" id="deadlineInput" name="deadline" value="{{ $lot->deadline }}" required>
                                    </div>

                                    <div class="mb-4 col-md-4">
                                        <label for="typeInput" class="fw-semibold">Тип:</label>
                                        <select class="form-control max-select" id="typeInput" name="type" required>
                                            <option value="fixed" {{ $lot->type == 'fixed' ? 'selected' : '' }}>Фиксированный</option>
                                            <option value="hourly" {{ $lot->type == 'hourly' ? 'selected' : '' }}>Помеченный по часам</option>
                                        </select>
                                    </div>

                                    <div class="mb-4 col-md-4">
                                        <label for="statusInput" class="fw-semibold">Статус:</label>
                                        <select class="form-control max-select" id="statusInput" name="status" required>
                                            <option value="open" {{ $lot->status == 'open' ? 'selected' : '' }}>Открытый</option>
                                            <option value="closed" {{ $lot->status == 'closed' ? 'selected' : '' }}>Закрытый</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4 col-md-8">
                                        <label for="descriptionInput" class="fw-semibold">Описание:</label>
                                        <textarea class="form-control" id="descriptionInput" placeholder="Описание" name="description">{{ $lot->description }}</textarea>
                                    </div>

                                    <div class="mb-4 col-md-4">
                                        <label for="serviceSubCategoryInput" class="fw-semibold">Подкатегория услуги:</label>
                                        <select class="form-control max-select" id="serviceSubCategoryInput" name="service_sub_category_id" required>
                                            @foreach ($serviceSubCategories as $category)
                                                <option value="{{ $category->id }}" {{ $lot->service_sub_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Обновить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Select2 CSS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script>
            $(document).ready(function() {
                $('.max-select').select2({
                    theme: 'bootstrap-5',
                    placeholder: 'Выбрать...',
                    allowClear: true
                });

                const deadlineInput = document.getElementById('deadlineInput');

                const today = new Date();
                const yyyy = today.getFullYear();
                const mm = String(today.getMonth() + 1).padStart(2, '0');
                const dd = String(today.getDate()).padStart(2, '0');
                const minDate = `${yyyy}-${mm}-${dd}`;

                deadlineInput.setAttribute('min', minDate);

                deadlineInput.addEventListener('input', function () {
                    if (deadlineInput.value < minDate) {
                        alert('Вы не можете выбрать дату раньше сегодняшнего дня!');
                        deadlineInput.value = minDate;
                    }
                });
            });
        </script>

@endsection
