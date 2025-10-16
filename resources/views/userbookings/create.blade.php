@extends('layouts.userapp')

@section('content')
<div class="container">
    <h1>Buat Booking Baru</h1>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form buat booking --}}
    <form action="{{ route('user.bookings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="title" class="form-label">Merk Kendaraan</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>


        {{-- Dropdown Service --}}
        <div class="mb-3">
            <label for="service_id" class="form-label">Pilih Service</label>
            <select name="service_id" id="service_id" class="form-select" required>
                <option value="">-- Pilih Service --</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}"
                            data-description="{{ $service->description }}">
                        {{ $service->title }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tempat tampilkan deskripsi --}}
        <div class="mb-3">
            <label class="form-label">Deskripsi Service</label>
            <div id="service-description" class="p-3 border rounded bg-light text-dark">
                <em>Pilih service untuk melihat deskripsi...</em>
            </div>
        </div>

        {{-- Alamat --}}
        <div class="mb-3">
            <label for="address" class="form-label">Alamat</label>
            <input type="text" name="address" id="address"
                   class="form-control" value="{{ old('address') }}" required>
        </div>
        
        {{-- Nomor Telepon --}}
        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input type="text" name="phone" id="phone"
                   class="form-control" value="{{ old('phone') }}" required>
        </div>

        {{-- Tanggal Kedatangan --}}
        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Kedatangan</label>
            <input type="date" name="date" id="date"
                   class="form-control" value="{{ old('date') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

{{-- Script untuk tampilkan deskripsi --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("service_id");
    const descBox = document.getElementById("service-description");

    dropdown.addEventListener("change", function () {
        const selected = dropdown.options[dropdown.selectedIndex];
        const desc = selected.getAttribute("data-description");

        if (desc) {
            descBox.innerHTML = desc;
        } else {
            descBox.innerHTML = "<em>Pilih service untuk melihat deskripsi...</em>";
        }
    });
});
</script>
@endsection
