@extends('layouts.app')

@section ('title', 'Data About')

@section ('content')

<div class="container">
    <div class="row">  
        <div class="col-md-12">
            <form action="/about" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf 
                <div class="form-group">
                    <label for="">CV Critical Performance</label>
                    <input type="text" class="form-control" name="name" placeholder="Judul" value="{{$about->name}}">
                </div>
                @error('name')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Deskripsi</label>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi">{{$about->description}}
                    </textarea>
                </div>
                @error('description')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{$about->alamat}}">
                </div>
                @error('alamat').
                <small style="color:red">{{ $message }}</small>
                @enderror
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" value="{{$about->email}}">
                </div>
                @error('email')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Telepon</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Telepon" value="{{$about->telepon}}">
                </div>
                @error('telepon')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <label for="">Maps Emded</label>
                    <textarea name="maps_emded" id="" cols="30" rows="10" class="form-control" placeholder="Maps Emded">{{$about->maps_emded}}
                </div>
                @error('maps_emded')
                <small style="color:red">{{$message}}</small>
                @enderror
                <img src="/image/{{$about->logo}}" alt="" class="img-fluid">
                <div class="form-group">
                    <label for="">Gambar</label>
                    <input type="file" class="form-control" name="logo">
                </div>
                @error('maps_emded')
                <small style="color:red">{{$message}}</small>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection