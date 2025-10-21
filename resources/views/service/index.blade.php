@extends('layouts.app')

@section('title', 'Data Service')

@section('content')

<div class="container">
    <a href="{{ route('services.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

    {{-- Pesan sukses --}}
    @if ($message = Session::get('message'))
        <div class="alert alert-success">
            <strong>Berhasil!</strong>
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $i = 1; @endphp
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $service->title }}</td>
                        <td class="text-wrap">{{ $service->description }}</td>
                        <td>
                            <img src="/image/{{ $service->image }}" alt="{{ $service->title }}" class="img-fluid rounded" width="60">
                        </td>
                        <td>
                            @if ($service->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Tidak Aktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('services.edit', $service->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                @if($services->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data layanan</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

@endsection
