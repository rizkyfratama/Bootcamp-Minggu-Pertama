<!DOCTYPE html>
<html>
<head>
    <title>Tambah Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h2 class="mb-4">➕ Tambah Booking</h2>

    <form action="{{ url('/bookings') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Ruangan</label>
            <input type="text" name="room_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="user_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tujuan</label>
            <textarea name="purpose" class="form-control" rows="3" required></textarea>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Waktu Mulai</label>
                <input type="datetime-local" name="start_time" class="form-control" required>
            </div>
            <div class="col">
                <label class="form-label">Waktu Selesai</label>
                <input type="datetime-local" name="end_time" class="form-control" required>
            </div>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
