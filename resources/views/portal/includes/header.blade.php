<!-- top nav -->
<nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
    <!-- close sidebar -->
    <button class="btn py-0 d-lg-none" id="open-sidebar">
        <span class="bi bi-list text-primary h3"></span>
    </button>
    <div class="dropdown ml-auto">
        <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
            <span class="bi bi-person text-primary h4"></span>
            <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
        </button>
        <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
            <a class="dropdown-item" href="{{route('auth.change.password')}}">Change Password</a>
            <a class="dropdown-item" href="{{route('auth.logout')}}">Logout</a>
        </div>
    </div>
</nav>
</nav>
