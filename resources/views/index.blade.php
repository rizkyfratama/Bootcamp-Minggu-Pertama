<!DOCTYPE html>
<html>
<head>
    <title>Daftar Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    <div class="container">
        <h1 class="mb-4">📋 Daftar Booking</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ url('/bookings/create') }}" class="btn btn-primary mb-3">+ Tambah Booking</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Ruangan</th>
                    <th>User</th>
                    <th>Tujuan</th>
                    <th>Waktu</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->room_name }}</td>
                    <td>{{ $booking->user_name }}</td>
                    <td>{{ $booking->purpose }}</td>
                    <td>{{ $booking->start_time }} - <br>{{ $booking->end_time }}</td>
                    <td>
                        <span class="badge bg-{{ $booking->status == 'approved' ? 'success' : ($booking->status == 'rejected' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ url('/bookings/'.$booking->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ url('/bookings/'.$booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus booking ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Belum ada data booking.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</body>
</html>
