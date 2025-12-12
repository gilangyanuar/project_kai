<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LOGIN - MOBILE TRAIN INSPECTION SYSTEM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #1e1e2f; }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
        }

        .header {
            background: #fff;
            padding: 25px 40px;
            border-bottom: 4px solid #f58634;
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header img { height: 50px; }
        .header-title { font-weight: 500; font-size: 20px; }

        .main {
            background: #222463;
            padding: 70px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 550px;
        }

        .login-box {
            background: #fff;
            padding: 40px 45px;
            border-radius: 18px;
            width: 400px;
            text-align: center;
            box-shadow: 0 10px 26px rgba(0,0,0,0.28);
            position: relative;
        }

        .login-title {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
        }

        /* POPUP */
        .overlay-popup {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0,0,0,0.45);
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 260px;
            z-index: 999;
        }

        .popup-box {
            width: 400px;
            padding: 35px 30px;
            border-radius: 20px;
            background: #E3F2FD;
            border: 3px solid #90CAF9;
            text-align: center;
            box-shadow: 0 8px 28px rgba(0,0,0,0.3);
        }

        .popup-title {
            font-weight: 500;
            font-size: 20px;
            margin-top: 12px;
            margin-bottom: 8px;
        }

        .popup-msg {
            font-size: 15px;
            line-height: 1.4;
            margin-bottom: 10px;
        }

        .input {
            width: 100%;
            padding: 12px 20px;
            border-radius: 30px;
            border: 1px solid #aaa;
            font-size: 14px;
            margin-top: 10px;
            font-weight: 400;
        }

        .password-wrapper { position: relative; margin-top: 18px; }
        .password-wrapper .input { padding-right: 56px; }

        .toggle-password {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            width: 34px;
            height: 34px;
            border-radius: 50%;
            border: 1px solid #dedede;
            background: #f7f7f7;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            user-select: none;
        }

        .toggle-password svg {
            pointer-events: none;
        }

        .btn {
            width: 100%;
            padding: 12px;
            border-radius: 30px;
            border: none;
            background: #222463;
            color: #fff;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <img src="{{ asset('images/Logo_KAI01.png') }}">
        <div class="header-title">MOBILE TRAIN INSPECTION SYSTEM</div>
    </div>

    <div class="main">
        <div class="login-box">

            <div class="login-title">LOGIN</div>

            {{-- POPUP ERROR --}}
            @if(session('error'))
                <div class="overlay-popup" id="errorPopup">
                    <div class="popup-box">
                        <div class="popup-title" style="color:red;">Login Gagal</div>
                        <div class="popup-msg">{{ session('error') }}</div>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        let popup = document.getElementById("errorPopup");
                        if (popup) popup.remove();
                    }, 3000);
                </script>
            @endif

            {{-- POPUP SUCCESS --}}
            @if(session('success'))
                <div class="overlay-popup" id="successPopup">
                    <div class="popup-box">
                        <div class="popup-title" style="color:green;">
                            {{ session('redirect_dashboard') ? 'Login Berhasil' : 'Sukses' }}
                        </div>
                        <div class="popup-msg">{{ session('success') }}</div>
                    </div>
                </div>

                <script>
                    setTimeout(() => {
                        let popup = document.getElementById("successPopup");
                        if(popup) popup.remove();
                        @if(session('redirect_dashboard'))
                            window.location.href = "{{ route('dashboard') }}";
                        @endif
                    }, 3000);
                </script>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <input type="text" name="nip" placeholder="Masukkan NIP" class="input">

                <div class="password-wrapper">
                    <input type="password" name="password" id="password-field" placeholder="Password" class="input">

                    <span class="toggle-password" onclick="togglePassword()">
                        <!-- Eye icon (show) -->
                        <svg id="icon-eye" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#555" stroke-width="1.2" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8z"/>
                            <circle cx="8" cy="8" r="2.5"/>
                        </svg>

                        <!-- Eye Slash icon (hide) -->
                        <svg id="icon-eye-slash" xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="none" stroke="#555" stroke-width="1.2" viewBox="0 0 16 16" style="display:none;">
                            <path d="M1 1l14 14"/>
                            <path d="M13.359 11.238C14.502 10.146 15.317 8.837 16 8c-.683-.837-1.498-2.146-2.641-3.238l-.723.724C13.924 6.377 14.66 7.56 15.2 8c-.54.44-1.276 1.623-2.564 2.514l.723.724z"/>
                            <path d="M2.094 3.403L1.03 2.34l1.43-1.43 12.02 12.02-1.43 1.43-1.13-1.13C10.65 14.432 9.37 14.75 8 14.75 3 14.75 0 8 0 8c.642-1.016 1.47-2.33 2.823-3.614l-.729-.983z"/>
                            <path d="M5.354 6.657a2.5 2.5 0 0 1 3.188 3.188l-3.188-3.188z"/>
                        </svg>
                    </span>
                </div>

                <button class="btn">MASUK</button>

            </form>

        </div>
    </div>

</div>

<script>
function togglePassword() {
    const input = document.getElementById('password-field');
    const iconEye = document.getElementById('icon-eye');
    const iconEyeSlash = document.getElementById('icon-eye-slash');

    if (input.type === "password") {
        input.type = "text";
        iconEye.style.display = "none";
        iconEyeSlash.style.display = "block";
    } else {
        input.type = "password";
        iconEye.style.display = "block";
        iconEyeSlash.style.display = "none";
    }
}
</script>

</body>
</html>
