@extends('layouts.userapp')

@section ('title', 'Data Booking')


@section('content')
    <div class="container">
        <h1>Daftar Booking Saya</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a href="{{ route('user.bookings.create') }}" class="btn btn-primary">+ Buat Booking Baru</a>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis Service</th>
                    <th>Tanggal Kedatangan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{  $booking->title }}</td>
                        <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>
                            <a href="{{ route('user.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <a href="{{ route('user.bookings.edit', $booking->id) }}" class="btn btn-info btn-sm">Edit</a>
                            <br>
                            <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
