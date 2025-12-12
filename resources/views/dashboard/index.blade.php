<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>DASHBOARD - MTIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', Arial, sans-serif;
            background: #f5f7fa;
            display: flex;
        }

        .sidebar {
            width: 260px;
            background: #1f2367;
            color: white;
            height: 100vh;
            padding-top: 35px;
            position: fixed;
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 35px;
        }

        .sidebar .logo img {
            width: 140px;
        }

        .sidebar ul { list-style: none; padding: 0; }
        .sidebar ul li {
            padding: 14px 25px;
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            color: #cdd2ff;
            transition: 0.2s;
        }

        .sidebar ul li.active,
        .sidebar ul li:hover {
            background: #4451ff;
            color: #fff;
        }

        .main-content {
            margin-left: 260px;
            width: calc(100% - 260px);
        }

        .topbar {
            width: 100%;
            padding: 18px 30px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .profile-box { display: flex; align-items: center; gap: 15px; font-weight: 600; }
        .notif-icon { font-size: 20px; cursor: pointer; }

        .profile-box img {
            width: 38px;
            height: 38px;
            border-radius: 50%;
        }

        .logout-icon { font-size: 20px; cursor: pointer; margin-left: 5px; }

        .container { padding: 30px; }

        .summary-box { display: flex; gap: 25px; margin-bottom: 35px; }

        .summary-card {
            background: white;
            flex: 1;
            padding: 25px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        }

        .summary-card h3 { font-size: 18px; margin-bottom: 8px; }
        .summary-card .count { font-size: 28px; font-weight: bold; color: #222; }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 18px rgba(0,0,0,0.08);
        }

        table th {
            background: #f0f0f7;
            padding: 14px;
            text-align: left;
            font-weight: 600;
        }

        table td { padding: 14px; font-size: 14px; }

        .status-select {
            padding: 6px 10px;
            border-radius: 6px;
            font-size: 13px;
            border: none;
            outline: none;
            font-weight: 600;
            color: white;
            cursor: pointer;
        }

        .status-aktif { background: #4caf50; }
        .status-tidak { background: #e53935; }
        .btn-primary {
            background: #4451ff;
            color: white;
            padding: 8px 14px;
            border-radius: 8px;
            text-decoration: none;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.3);
            backdrop-filter: blur(3px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 2000;
        }

        .popup-box {
            background: #d9e6ff;
            padding: 30px;
            width: 330px;
            border-radius: 15px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0,0,0,0.2);
            animation: fadeIn 0.3s ease;
        }

        .popup-box i { font-size: 38px; margin-bottom: 10px; color: #4a6cf7; }

        .popup-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .popup-buttons button {
            padding: 8px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            background: #ffffff;
            color: #2C2A6B;
            border: 2px solid #2C2A6B;
            transition: 0.25s ease;
        }

        .popup-buttons button.active {
            background: #2C2A6B !important;
            color: #ffffff !important;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('images/Logo_KAI02.png') }}" alt="Logo KAI">
        </div>

        <ul>
            <li class="active"><i class="fa-solid fa-house"></i> Dashboard</li>
            <li><i class="fa-solid fa-users"></i> Manajemen User</li>
            <li><i class="fa-solid fa-database"></i> Master Data</li>
            <li><i class="fa-solid fa-folder"></i> Arsip Laporan</li>
            <li><i class="fa-solid fa-gear"></i> Pengaturan</li>
        </ul>
    </div>

    <div class="main-content">

        <div class="topbar">
            <h2>Dashboard / Home</h2>

            <div class="profile-box">
                <i class="fa-solid fa-bell notif-icon"></i>
                <img src="https://i.pravatar.cc/150?img=12">
                <span>Budiman</span>
                <i class="fa-solid fa-right-from-bracket logout-icon"></i>
            </div>
        </div>

        <div class="container">

            <div class="summary-box">
                <div class="summary-card"><h3>Total User</h3><div class="count">20</div></div>
                <div class="summary-card"><h3>Total Mekanik</h3><div class="count">20</div></div>
                <div class="summary-card"><h3>Total Pengawas</h3><div class="count">20</div></div>
                <div class="summary-card"><h3>Laporan Arsip</h3><div class="count">20</div></div>
            </div>

            <h2>Manajemen User</h2>
            <a href="#" class="btn-primary" style="float: right; margin-bottom: 12px;">+ Tambah Pengguna</a>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <tr>
                        <td>#120542</td>
                        <td>134234223</td>
                        <td>Budiman</td>
                        <td>Mekanik</td>
                        <td>
                            <select class="status-select status-tidak" onchange="updateStatusColor(this)">
                                <option value="aktif">Aktif</option>
                                <option value="tidak" selected>Tidak Aktif</option>
                            </select>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen-to-square" style="color:blue; cursor:pointer;" onclick="openPopup(120542)"></i>
                            <i class="fa-solid fa-trash" style="color:red;margin-left:8px;"></i>
                        </td>
                    </tr>

                    <tr>
                        <td>#88921</td>
                        <td>125432211</td>
                        <td>Lestari</td>
                        <td>Pengawas</td>
                        <td>
                            <select class="status-select status-aktif" onchange="updateStatusColor(this)">
                                <option value="aktif" selected>Aktif</option>
                                <option value="tidak">Tidak Aktif</option>
                            </select>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen-to-square" style="color:blue; cursor:pointer;" onclick="openPopup(88921)"></i>
                            <i class="fa-solid fa-trash" style="color:red;margin-left:8px;"></i>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

    <div class="popup-overlay" id="popupConfirm">
        <div class="popup-box">
            <i class="fa-solid fa-circle-info"></i>
            <h3>Apakah anda yakin ingin<br>mengubah data dari user ini?</h3>

            <div class="popup-buttons">
                <button class="btn-yes" onclick="confirmEdit(this)">Iya</button>
                <button class="btn-no" onclick="closePopup(this)">Tidak</button>
            </div>
        </div>
    </div>

</body>

<script>

    let selectedUserId = null;

    function updateStatusColor(select) {
        select.classList.remove("status-aktif", "status-tidak");
        if (select.value === "aktif") select.classList.add("status-aktif");
        else select.classList.add("status-tidak");
    }

    function openPopup(id) {
        selectedUserId = id;
        document.getElementById("popupConfirm").style.display = "flex";
    }

    function closePopup(btn) {
        btn.classList.add("active");
        setTimeout(() => {
            btn.classList.remove("active");
            document.getElementById("popupConfirm").style.display = "none";
        }, 250);
    }

    function confirmEdit(btn) {
    btn.classList.add("active");
    setTimeout(() => {
        btn.classList.remove("active");
        document.getElementById("popupConfirm").style.display = "none";

        // Ubah bagian ini ↓↓↓
        window.location.href = "/dashboard/user/" + selectedUserId + "/edit";

    }, 250);
}


</script>

</html>
