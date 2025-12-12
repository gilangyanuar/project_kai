<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data User</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f2f7;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 40px 0;
        }

        .edit-container {
            width: 60%;
            background: #ffffff;
            margin: auto;
            padding: 45px 55px;
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border: 1px solid #e5e5e5;
        }

        h2 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .subtitle {
            margin-top: 6px;
            color: #6b6b6b;
            display: block;
            font-size: 14px;
            margin-bottom: 35px;
        }

        label {
            font-weight: 600;
            font-size: 15px;
            margin-bottom: 6px;
            display: block;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #cfcfcf;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 22px;
            transition: 0.2s;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: #4451ff;
            box-shadow: 0 0 0 2px rgba(68, 81, 255, 0.15);
        }

        .btn-group {
            margin-top: 10px;
            display: flex;
            justify-content: flex-end;
            gap: 15px;
        }

        .btn {
            padding: 10px 22px;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            text-decoration: none;
            transition: 0.2s;
            font-size: 14px;
        }

        .btn-cancel {
            background: #ffffff;
            border: 1px solid #333;
            color: #333;
        }

        .btn-cancel:hover {
            background: #f4f4f4;
        }

        .btn-save {
            background: #4451ff;
            color: #ffffff;
            border: 1px solid #4451ff;
        }

        .btn-save:hover {
            background: #2f3dff;
        }
    </style>
</head>

<body>

    <div class="edit-container">

        <h2>
            <i class="fa-solid fa-pen-to-square"></i> 
            Edit Data User
        </h2>

        <span class="subtitle">Perbarui informasi pengguna dengan data terbaru.</span>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            {{-- NIPP --}}
            <label>NIPP</label>
            <input type="text" name="nip" value="{{ $user->nip }}" required>

            {{-- Nama --}}
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $user->name }}" required>

            {{-- Jabatan --}}
            <label>Jabatan</label>
            <select name="jabatan" required>
                <option value="Mekanik" {{ $user->jabatan == 'Mekanik' ? 'selected' : '' }}>Mekanik</option>
                <option value="Pengawas" {{ $user->jabatan == 'Pengawas' ? 'selected' : '' }}>Pengawas</option>
            </select>

            <div class="btn-group">
                <a href="/dashboard" class="btn btn-cancel">Tidak</a>
                <button type="submit" class="btn btn-save">Simpan</button>
            </div>

        </form>

    </div>

</body>
</html>
