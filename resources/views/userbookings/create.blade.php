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
            <label for="title" class="form-label">Judul Booking</label>
            <input type="text" name="title" id="title"
                   class="form-control" value="{{ old('title') }}" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Tanggal Booking</label>
            <input type="date" name="date" id="date"
                   class="form-control" value="{{ old('date') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('user.bookings.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
