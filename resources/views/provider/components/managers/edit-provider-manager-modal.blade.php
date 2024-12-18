 @foreach($managers as $manager)
     <form action="{{ route('managers.update',$manager->id) }}" method="POST">
         @csrf
         @method('PUT')
        <div class="offcanvas offcanvas-end w-50" tabindex="-1" id="managerEditProviderOffcanvas{{$manager->id}}">

            <div class="offcanvas-header border-bottom" style="padding-top: 20px; padding-bottom: 20px">
                <div class="d-flex align-items-center">
                    <div class="avatar-text avatar-md items-details-close-trigger" data-bs-dismiss="offcanvas" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Details Close"><i class="feather-arrow-left"></i></div>
                    <span class="vr text-muted mx-4"></span>
                </div>
                <div class="d-none d-md-flex gap-1 align-items-center justify-content-center">
                    <div class="comments">
                        <button href="javascript:void(0);" class="btn btn-primary d-inline-block mt-4">Сохранить</button>
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
                 <input type="hidden" name="forGetId" id="forGetId">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_name" class="form-label">Имя менеджера:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $manager->name }}" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_email" class="form-label">Электронная почта менеджера:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$manager->email}}" required>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="manager_password" class="form-label">Пароль менеджера (оставьте пустым, если не изменился):</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="role" class="form-label">Роль:</label>
                            <input type="text" readonly class="form-control" id="role" name="role" value="{{ $manager->role->name }}" required>
                        </div>
                    </div>
                </div>
                <!--! END: Comments !-->
            </div>
        </div>
     </form>
 @endforeach
