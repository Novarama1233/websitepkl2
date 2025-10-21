@extends('layouts.app')

@section ('title', 'Data Service')

@section ('content')

<div class="container">
    <a href="/admin/services" class=" btn btn-primary mb-3">Kembali</a>
    <div class="row">  
        <div class="col-md-12">
            <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf 
                <div class="form-group">
                    <label for="">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Judul">
                </div>
                @error('title')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder=Deskripsi></textarea>
                </div>
                @error('description')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="image">
                </div>
                @error('image')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group mb-3">
    <label for="is_active">Status Layanan</label>
    <select name="is_active" id="is_active" class="form-control">
        <option value="1" {{ $service->is_active ? 'selected' : '' }}>Aktif</option>
        <option value="0" {{ !$service->is_active ? 'selected' : '' }}>Nonaktif</option>
    </select>
</div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection