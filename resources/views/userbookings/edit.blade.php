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

                <div class="form-group mb-3">
                    <label for="title">Jenis Service</label>
                    <input type="text" 
                           id="title" 
                           class="form-control" 
                           name="title" 
                           placeholder="Jenis Service" 
                           value="{{ old('title', $booking->title) }}">
                    @error('title')
                        <small style="color:red">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="date">Tanggal Kedatangan</label>
                    <input type="date" 
                           id="date" 
                           name="date" 
                           class="form-control" 
                           value="{{ old('date', $booking->date) }}">
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
@endsection
