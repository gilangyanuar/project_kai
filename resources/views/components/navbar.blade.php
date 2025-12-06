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
                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal-changepass">Ganti Password</a>
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">Keluar</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="modal fade" id="modal-changepass">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ganti Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="alert alert-warning">
                            Dikarenakan Anda baru pertama kali masuk / melakukan reset password, mohon ganti password Anda saat ini untuk alasan keamanan.
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="txt_oldpass" name="txt_oldpass" placeholder="">
                        <label for="txt_oldpass">Password Lama</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="txt_newpass" name="txt_newpass" placeholder="">
                        <label for="txt_newpass">Password Baru</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="txt_newpass_confirmation" name="txt_newpass_confirmation" placeholder="">
                        <label for="txt_newpass_confirmation">Konfirmasi Password Baru</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link me-2">Batal</button>
                    <button type="submit" class="btn btn-primary">Ganti Password &amp; Keluar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('modal-changepass'), {});
            // myModal.show();
        });
    </script>
</div>