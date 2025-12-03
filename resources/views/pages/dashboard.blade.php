<!DOCTYPE html>
<html lang="id" >
    <head>
        <title>Dashboard - {{ getenv('APP_NAME') }}</title>
        @include('components.head_script')
    </head>
    <body>
        <div id="wrapper" class="d-flex">
            <aside id="sidebar-wrapper" class="border-end bg-body-tertiary">
                <div class="d-flex flex-column flex-shrink-0 px-3 py-5">
                    <div class="text-center d-flex flex-row flex-lg-column align-items-center justify-content-center mb-4">
                        <div class="profile-thumbnail dashboard-avatar mx-lg-auto me-3">
                            <img src="{{ asset('images/user-default.jpg') }}" class="img-avatar rounded-circle border-white" alt="User Picture">
                        </div>
                        <div class="d-flex flex-column">
                            <span class="h6 my-1 my-lg-2 me-3 me-lg-0">Hi, Bonnie!</span>
                            <a href="{{ route('logout') }}" class="btn btn-gray-300 btn-xs">
                                <span class="me-2">
                                    <span class="fas fa-sign-out-alt"></span>
                                </span>
                                Keluar
                            </a>
                        </div>
                    </div>
                    <div class="list-group dashboard-menu list-group-sm">
                        <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action active">
                            <span class="icon icon-sm me-2">
                                <span class="fa-regular fa-house"></span>
                            </span>
                            Dashboard
                            <span class="icon icon-xs ms-auto">
                                <span class="fas fa-chevron-right"></span>
                            </span>
                        </a>
                        <a href="./account.html" class="d-flex list-group-item border-0 list-group-item-action">
                            Overview
                            <span class="icon icon-xs ms-auto">
                                <span class="fas fa-chevron-right"></span>
                            </span>
                        </a>
                    </div>
                </div>
            </aside>
            <main id="page-content-wrapper"></main>
        </div>
    </body>
    @include('components.foot_script')
</html>