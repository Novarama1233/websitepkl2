@extends('layouts.userapp')

@section('title', 'Detail Booking')

@section('content')
    <div class="container">
        <h1>Detail Booking</h1>

        <div class="card">
            <div class="card-body">
                <p><strong>ID Booking:</strong> {{ $booking->id }}</p>
                <p><strong>Judul:</strong> {{ $booking->title }}</p>
                <p><strong>Tanggal Kedatangan:</strong> {{ $booking->date }}</p>
                <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                <p><strong>Dibuat pada:</strong> {{ $booking->created_at->format('d-m-Y H:i') }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">← Kembali</a>
            <form action="{{ route('user.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                        onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
            </form>
        </div>
    </div>
@endsection
