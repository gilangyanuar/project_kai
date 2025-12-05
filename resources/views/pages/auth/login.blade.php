<!DOCTYPE html>
<html lang="id" >
    <head>
        <title>Masuk - {{ getenv('APP_NAME') }}</title>
        @include('components.head_script')
    </head>
    <body>
        <section class="min-vh-100 d-flex align-items-center section-image overlay-soft-dark" style="background-image: url('https://www.rubis.id/wp-content/uploads/2022/10/45df834a73a365fe1027edfa5b62de51-1.jpeg');">
            <div class="container" style="z-index: 2;">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex flex-column align-items-center justify-content-center">

                        @if ($errors->any())
                        <div class="alert alert-danger mb-4 w-100 fmxw-500">
                            <div class="d-flex align-items-center">
                                <div class="me-2">
                                    <i class="fas fa-exclamation fa-2x"></i>
                                </div>
                                <div>
                                   <p class="fw-bolder mb-0">Terjadi Kesalahan!</p>
                                   <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif

                        <div class="signin-inner my-4 my-lg-0 bg-white shadow-soft border rounded border-gray-300 p-4 p-lg-5 w-100 fmxw-500">
                            <div class="text-center text-md-center mb-5 mt-md-0">
                                <img src="{{ asset('images/favicons/icon-192.png') }}" alt="" class="w-25">
                                <h1 class="mb-0 mt-3 h3">KAI Facility Hub</h1>
                                <p class="text-muted">Masuk untuk melanjutkan</p>
                            </div>
                            <form action="{{ route('login.post') }}" method="post">
                                @csrf
                                <div class="form-group mb-4">
                                    <label for="nipp">Nomor Identitas Pegawai PT. (NIPP)</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">
                                            <span class="fas fa-id-card"></span>
                                        </span>
                                        <input type="text" class="form-control" placeholder="123456" id="nipp" name="nipp" required value="{{ old('nipp', '') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">
                                                <span class="fas fa-unlock-alt"></span>
                                            </span>
                                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required="">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div class="form-check mb-0">
                                            <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                                            <label class="form-check-label mb-0" for="remember">Ingat saya</label>
                                        </div>
                                        <div>
                                            <a href="#" class="small text-right">Lupa password?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Masuk</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
    @include('components.foot_script')
</html>