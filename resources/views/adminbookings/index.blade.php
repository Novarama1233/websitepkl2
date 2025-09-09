@extends('layouts.app')

@section ('title', 'Data Booking')

@section ('content')

    <div class="container">
        <h1>Daftar Bookings</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->user->name ?? '-' }}</td>
                        <td>{{ $booking->created_at->format('d-m-Y') }}</td>
                        <td>{{ $booking->status }}</td>
                        <td>
    @if($booking->status === 'pending')
    {{-- Konfirmasi --}}
    <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
    </form>
    {{-- Tolak --}}
    <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
    </form>

@elseif($booking->status === 'confirmed')
    {{-- Batalkan Konfirmasi --}}
    <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-warning btn-sm">Batalkan Konfirmasi</button>
    </form>

@elseif($booking->status === 'reject')
    {{-- Batalkan Penolakan --}}
    <form action="{{ route('admin.bookings.cancelreject', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit" class="btn btn-primary btn-sm">Batalkan Penolakan</button>
    </form>
@endif



    <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
    </form>
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
