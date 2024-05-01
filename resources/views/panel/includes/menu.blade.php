<!-- sidebar -->
<div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
    <h1 class="text-primary d-flex my-4 justify-content-center">
        @hasrole(\App\Constants\UserRoles::ADMIN)
        Admin Portal
        @endhasrole
        @hasrole(\App\Constants\UserRoles::USER)
        User Portal
        @endhasrole
    </h1>
    <div class="list-group rounded-0">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action border-0 d-flex align-items-center {{Route::currentRouteName() == 'dashboard' ? 'active' : ''}}">
            <span class="bi bi-border-all"></span>
            <span class="ml-2">Dashboard</span>
        </a>
        @hasrole(\App\Constants\UserRoles::USER)
        <a href="{{route('auth.profile')}}" class="list-group-item list-group-item-action border-0 d-flex align-items-center {{Route::currentRouteName() == 'auth.profile' ? 'active' : ''}}">
            <span class="bi bi-person"></span>
            <span class="ml-2">Profile Page</span>
        </a>
        <a href="{{route('auth.change.password')}}" class="list-group-item list-group-item-action border-0 align-items-center {{Route::currentRouteName() == 'auth.change.password' ? 'active' : ''}}">
            <span class="bi bi-shield-lock"></span>
            <span class="ml-2">Change Password</span>
        </a>
        @endhasrole
        @hasrole(\App\Constants\UserRoles::ADMIN)
        <a href="{{route('users')}}" class="list-group-item list-group-item-action border-0 d-flex align-items-center {{Route::currentRouteName() == 'users' ? 'active' : ''}}">
            <span class="bi bi-person"></span>
            <span class="ml-2">User List</span>
        </a>
        @endhasrole

    </div>
</div>
