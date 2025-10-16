@extends('layouts.userapp')

@section('title', 'Edit Booking')

@section('content')
<div class="container">
    <a href="{{ route('user.bookings.index') }}" class="btn btn-primary mb-3">Kembali</a>
    <div class="row">  
        <div class="col-md-12">
            <form action="{{ route('user.bookings.update', $booking->id) }}" method="POST">
                @method('PUT')
                @csrf 

                {{-- Merk Kendaraan --}}
                <div class="form-group mb-3">
                    <label for="title">Merk Kendaraan</label>
                    <input type="text" 
                        id="title" 
                        name="title" 
                        class="form-control" 
                        value="{{ old('title', $booking->title ?? '') }}" required>
                    @error('title')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>


                {{-- Dropdown Service --}}
                <div class="form-group mb-3">
                    <label for="service_id">Pilih Service</label>
                    <select name="service_id" id="service_id" class="form-select" required>
                        <option value="">-- Pilih Service --</option>
                        @foreach($services as $service)
                            <option value="{{ $service->id }}"
                                data-description="{{ $service->description }}"
                                {{ old('service_id', $booking->service_id) == $service->id ? 'selected' : '' }}>
                                {{ $service->title }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_id')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Tempat tampilkan deskripsi --}}
                <div class="mb-3">
                    <label class="form-label">Deskripsi Service</label>
                    <div id="service-description" class="p-3 border rounded bg-light text-dark">
                        <em>Pilih service untuk melihat deskripsi...</em>
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="form-group mb-3">
                    <label for="address">Alamat</label>
                    <input type="text" 
                           id="address" 
                           name="address" 
                           class="form-control" 
                           value="{{ old('address', $booking->address) }}" required>
                    @error('address')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Nomor Telepon --}}
                <div class="form-group mb-3">
                    <label for="phone">Nomor Telepon</label>
                    <input type="text" 
                           id="phone" 
                           name="phone" 
                           class="form-control" 
                           value="{{ old('phone', $booking->phone) }}" required>
                    @error('phone')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                {{-- Tanggal Kedatangan --}}
                <div class="form-group mb-3">
                    <label for="date">Tanggal Kedatangan</label>
                    <input type="date" 
                           id="date" 
                           name="date" 
                           class="form-control" 
                           value="{{ old('date', $booking->date) }}" required>
                    @error('date')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success btn-block">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script untuk tampilkan deskripsi --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const dropdown = document.getElementById("service_id");
    const descBox = document.getElementById("service-description");

    function updateDescription() {
        const selected = dropdown.options[dropdown.selectedIndex];
        const desc = selected.getAttribute("data-description");

        if (desc) {
            descBox.innerHTML = desc;
        } else {
            descBox.innerHTML = "<em>Pilih service untuk melihat deskripsi...</em>";
        }
    }

    // Panggil sekali saat halaman pertama dibuka
    updateDescription();

    // Update setiap kali dropdown berubah
    dropdown.addEventListener("change", updateDescription);
});
</script>
@endsection
