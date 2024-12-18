<form action="{{ route('managers.store')}}" method="POST">
    @csrf
    <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="managerProviderOffcanvas">
        <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
            <div class="d-flex align-items-center">
                <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
                <span class="vr text-muted mx-4"></span>
            </div>
            <div class="d-none d-md-flex gap-1 align-items-center justify-content-center">
                <div class="comments">
                    <button href="javascript:void(0);" class="btn btn-primary d-inline-block mt-4">Добавить менеджера</button>
                </div>
            </div>
        </div>
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="offcanvas-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <div id="taskDateRange">
                        <label class="form-label">Имя менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="text"  class="form-control" name="name" placeholder="Напишите имя поставщика" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="taskDateRange">
                        <label class="form-label">Электронная почта менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="text"  class="form-control" name="email" placeholder="Написать письмо поставщику" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div id="taskDateRange">
                        <label class="form-label">Пароль менеджера:</label>
                        <div class="input-group date input-daterange">
                            <input type="password"  class="form-control" name="password" placeholder="Написать письмо поставщику" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="company_id" value="{{ $company->id }}">
            <!--! END: Comments !-->
        </div>
    </div>
</form>
