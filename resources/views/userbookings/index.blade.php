@extends('layouts.userapp')

@section('title', 'Data Booking')

@section('content')
    <div class="container">
        <h1>Daftar Booking Saya</h1>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Pesan error --}}
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
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
                        <td>{{ $booking->title }}</td>
                        <td>
                            @if($booking->date)
                                {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}
                            @else
                                <em>Tidak ada tanggal</em>
                            @endif
                        </td>
                        <td>{{ ucfirst($booking->status) }}</td>
                        <td>
                            {{-- Tombol Detail --}}
                            <a href="{{ route('user.bookings.show', $booking->id) }}" class="btn btn-info btn-sm">Detail</a>

                            {{-- Tombol Edit --}}
                            <a href="{{ route('user.bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('user.bookings.destroy', $booking->id) }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Yakin hapus booking ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
