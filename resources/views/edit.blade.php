<!DOCTYPE html>
<html>
<head>
    <title>Edit Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <h2 class="mb-4">✏️ Edit Booking</h2>

    <form action="{{ url('/bookings/'.$booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Ruangan</label>
            <input type="text" name="room_name" class="form-control" value="{{ $booking->room_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Pengguna</label>
            <input type="text" name="user_name" class="form-control" value="{{ $booking->user_name }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tujuan</label>
            <textarea name="purpose" class="form-control" rows="3" required>{{ $booking->purpose }}</textarea>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Waktu Mulai</label>
                <input type="datetime-local" name="start_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($booking->start_time)) }}" required>
            </div>
            <div class="col">
                <label class="form-label">Waktu Selesai</label>
                <input type="datetime-local" name="end_time" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($booking->end_time)) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $booking->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $booking->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>

</body>
</html>
