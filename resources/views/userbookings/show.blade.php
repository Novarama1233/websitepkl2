@extends('layouts.userapp')

@section('title', 'Detail Booking')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Booking</h1>

    <div class="card">
        <div class="card-body">

        {{-- Merk Kendaraan --}}
            <div class="form-group mb-3">
                <label for="title">Merk Kendaraan</label>
                <input type="text" id="title" class="form-control"
                       value="{{ $booking->title ?? '-' }}" disabled>
            </div>
            {{-- Jenis Service --}}
            <div class="form-group mb-3">
                <label for="service">Jenis Service</label>
                <input type="text" id="service" class="form-control" 
                       value="{{ $booking->service->title ?? '-' }}" disabled>
            </div>

            {{-- Deskripsi Service --}}
            <div class="form-group mb-3">
                <label for="description">Deskripsi Service</label>
                <textarea id="description" class="form-control" rows="3" disabled>{{ $booking->service->description ?? '-' }}</textarea>
            </div>

            {{-- Tanggal Kedatangan --}}
            <div class="form-group mb-3">
                <label for="date">Tanggal Kedatangan</label>
                <input type="date" id="date" class="form-control"
                       value="{{ $booking->date }}" disabled>
            </div>

            {{-- Alamat --}}
            <div class="form-group mb-3">
                <label for="address">Alamat</label>
                <textarea id="address" class="form-control" rows="2" disabled>{{ $booking->address ?? '-' }}</textarea>
            </div>

            {{-- Nomor Telepon --}}
            <div class="form-group mb-3">
                <label for="phone">Nomor Telepon</label>
                <input type="text" id="phone" class="form-control"
                       value="{{ $booking->phone ?? '-' }}" disabled>
            </div>

            {{-- Status --}}
            <div class="form-group mb-3">
                <label for="status">Status</label>
                <input type="text" id="status" class="form-control"
                       value="{{ ucfirst($booking->status) }}" disabled>
            </div>

            {{-- Dibuat pada --}}
            <div class="form-group mb-3">
                <label for="created_at">Dibuat pada</label>
                <input type="text" id="created_at" class="form-control"
                       value="{{ $booking->created_at->format('d-m-Y H:i') }}" disabled>
            </div>

        </div>
    </div>

    {{-- Tombol Aksi --}}
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
