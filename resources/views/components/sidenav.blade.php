<aside id="sidebar-wrapper" class="border-end bg-body">
    <div class="d-flex flex-column flex-shrink-0 px-3 py-5 position-relative">
        <button class="btn btn-icon-only w-auto h-auto p-1 px-2 position-absolute top-0 right-0 mt-3 me-3 d-lg-none" data-toggle="sidebar">
            <span class="material-symbols-outlined lh-base">close</span>
        </button>
        <div class="text-center d-flex flex-row flex-lg-column align-items-center justify-content-center mb-4">
            <div class="profile-thumbnail dashboard-avatar mx-lg-auto me-3">
                <img src="{{ asset('images/user-default.jpg') }}" class="img-avatar rounded-circle border-white" alt="User Picture">
            </div>
            <div class="d-flex flex-column">
                <span class="h6 my-1 my-lg-2 me-3 me-lg-0">Hi, {{ Auth::user()->first_name }}!</span>
                <a href="{{ route('logout') }}" class="btn btn-gray-300 btn-xs">
                    <span class="me-2">
                        <span class="fas fa-sign-out-alt"></span>
                    </span>
                    Keluar
                </a>
            </div>
        </div>
        <hr class="border-0 border-top">
        <div class="list-group dashboard-menu list-group-sm mt-2">
            <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action {{ $active == 'dashboard' ? 'active' : '' }}">
                <span class="icon icon-sm me-3">
                    <span class="fas fa-gauge-high"></span>
                </span>
                Dashboard
                <div class="ms-auto">
                    <span class="badge bg-primary">5</span>
                </div>
            </a>
            <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action">
                <span class="icon icon-sm me-3">
                    <span class="fas fa-train"></span>
                </span>
                Jadwal KA
            </a>
            <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action">
                <span class="icon icon-sm me-3">
                    <span class="fas fa-clipboard-list"></span>
                </span>
                Checksheet
            </a>
            <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action">
                <span class="icon icon-sm me-3">
                    <span class="fas fa-file-circle-check"></span>
                </span>
                Laporan
            </a>
            <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action">
                <span class="icon icon-sm me-3">
                    <span class="fas fa-users"></span>
                </span>
                Pengguna
            </a>
        </div>
    </div>
</aside>