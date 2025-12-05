<!DOCTYPE html>
<html lang="id" >
    <head>
        <title>Dashboard - {{ getenv('APP_NAME') }}</title>
        @include('components.head_script')
    </head>
    <body>
        <div id="wrapper" class="d-flex">
            @include('components.sidenav', ['active' => 'dashboard'])
            <div id="page-content-wrapper">
                @include('components.navbar')

                <main id="main-content" class="mt-2">
                    <div class="container-xl">

                        <div class="row g-4 mt-2">
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icon icon-shape icon-shape-secondary organic-radius me-2">
                                                <span class="fas fa-train fa-lg text-info"></span>
                                            </div>
                                            <div class="dashcount-title text-end">
                                                <h5 class="fs-6 fw-normal mb-0">Gerbong Kereta</h5>
                                                <span class="fs-2">{{ $count_train }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icon icon-shape icon-shape-secondary organic-radius me-2">
                                                <span class="fas fa-screwdriver-wrench fa-lg text-warning"></span>
                                            </div>
                                            <div class="dashcount-title text-end">
                                                <h5 class="fs-6 fw-normal mb-0">Checksh. Berjalan</h5>
                                                <span class="fs-2">{{ $count_assignments['Total'] - $count_assignments['Approved'] }} / {{ $count_assignments['Total'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icon icon-shape icon-shape-secondary organic-radius me-2">
                                                <span class="fas fa-file-circle-check fa-lg text-success"></span>
                                            </div>
                                            <div class="dashcount-title text-end">
                                                <h5 class="fs-6 fw-normal mb-0">Checksh. Selesai</h5>
                                                <span class="fs-2">{{ $count_assignments['Approved'] }} / {{ $count_assignments['Total'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="icon icon-shape icon-shape-secondary organic-radius me-2">
                                                <span class="fas fa-users fa-lg text-tertiary"></span>
                                            </div>
                                            <div class="dashcount-title text-end">
                                                <h5 class="fs-6 fw-normal mb-0">Pengguna</h5>
                                                <span class="fs-2">{{ $count_user }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2 g-4">
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon me-3">
                                                <i class="fas fa-file-pen fa-xl"></i>
                                            </div>
                                            <div class="me-3">
                                                <h5 class="card-title mb-1">Assignment Hari Ini</h5>
                                                <p class="card-subtitle" style="">Detail assignment pada hari ini</p>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="" class="btn btn-icon-only btn-sm btn-light">
                                                    <i class="fas fa-up-right-from-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <ul class="list-group list-group-flush">
                                                @for ($x=1;$x<9;$x++)
                                                <li class="list-group-item rounded-0 px-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                                                        </div>
                                                        <div class="col">
                                                            <div class="small text-muted">KA 150</div>
                                                            <h6 class="mb-0">Parahyangan</h6>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex flex-column flex-md-row gap-1 gap-md-3 justify-content-end">
                                                                <span class="badge bg-tertiary">
                                                                    08:00
                                                                </span>
                                                                <span class="badge bg-success">
                                                                    Ditugaskan
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown">
                                                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon icon-sm">
                                                                        <span class="fas fa-ellipsis-v icon-dark"></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="card">
                                    <div class="card-header py-3">
                                        <div class="d-flex align-items-center">
                                            <div class="icon me-3">
                                                <i class="fas fa-file-circle-exclamation fa-xl"></i>
                                            </div>
                                            <div class="me-3">
                                                <h5 class="card-title mb-1">Laporan Kadaluarsa</h5>
                                                <p class="card-subtitle" style="">Ada 2 laporan yang sudah kadaluarsa</p>
                                            </div>
                                            <div class="ms-auto">
                                                <button class="btn btn-icon-only btn-sm btn-light me-1">
                                                    <i class="fas fa-check-double"></i>
                                                </button>
                                                <a href="" class="btn btn-icon-only btn-sm btn-light">
                                                    <i class="fas fa-up-right-from-square"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <ul class="list-group list-group-flush">
                                                @for ($x=1;$x<7;$x++)
                                                <li class="list-group-item rounded-0 px-1">
                                                    <div class="row align-items-center">
                                                        <div class="col-auto">
                                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck10">
                                                        </div>
                                                        <div class="col">
                                                            <h6 class="mb-1">
                                                                <span class="badge bg-primary me-1">KA 150</span>
                                                                Parahyangan
                                                            </h6>
                                                            <div class="small text-muted text-danger">Kadaluarsa dalam 5 menit</div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="d-flex flex-column flex-md-row gap-1 gap-md-3 justify-content-end">
                                                                <span class="badge bg-tertiary">
                                                                    25-12-2025 08:00
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="dropdown">
                                                                <button class="btn btn-link text-dark dropdown-toggle dropdown-toggle-split m-0 px-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <span class="icon icon-sm">
                                                                        <span class="fas fa-ellipsis-v icon-dark"></span>
                                                                    </span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-footer p-0">
                                        <div class="d-grid">
                                            <button class="btn py-3 rounded-0 rounded-bottom text-danger" disabled><i class="fa-solid fa-trash-can me-2"></i> Bersihkan Ditandai</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                @include('components.footer')
            </div>
        </div>
    </body>
    @include('components.foot_script')
</html>