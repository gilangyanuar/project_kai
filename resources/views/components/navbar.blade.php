<nav class="navbar navbar-expand-lg navbar-light border-bottom">
    <div class="container-fluid justify-content-start">
        <button class="btn btn-icon-only w-auto me-2" id="sidebarToggle" data-toggle="sidebar">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <a href="" class="me-2">
            <img src="{{ asset('images/favicons/icon-192.png') }}" class="app-logo" alt="App Logo">
        </a>
        <div class="ms-auto">
            <div class="dropdown">
                <button class="btn btn-light dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ auth()->user()->first_name }}
                    <span class="fas fa-chevron-down fa-sm ms-1"></span>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="#">Ganti Password</a>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</nav>