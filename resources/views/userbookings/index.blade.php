@extends('layouts.userapp')

@section('title', 'Data Booking')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Booking Saya</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pesan error --}}
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-3 text-end">
        <a href="{{ route('user.bookings.create') }}" class="btn btn-primary">+ Buat Booking Baru</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th class="d-none d-md-table-cell">ID</th> {{-- disembunyikan di layar kecil --}}
                    <th>Merk Kendaraan</th>
                    <th>Jenis Service</th>
                    <th class="d-none d-md-table-cell">Alamat</th> {{-- alamat hanya di layar medium ke atas --}}
                    <th>No. Telepon</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td class="d-none d-md-table-cell">{{ $booking->id }}</td>
                        <td>{{ $booking->title }}</td>
                        <td class="text-wrap">{{ $booking->service->title }}</td>
                        <td class="d-none d-md-table-cell text-wrap">{{ $booking->address ?? '-' }}</td>
                        <td>{{ $booking->phone ?? '-' }}</td>
                        <td>
                            @if($booking->date)
                                {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}
                            @else
                                <em>Tidak ada</em>
                            @endif
                        </td>
                        <td>
                            @php
                                $status = $booking->status;
                                $badgeClass = match ($status) {
                                    'pending'   => 'bg-warning text-dark',
                                    'confirmed' => 'bg-success',
                                    'reject'    => 'bg-danger',
                                    'finished'  => 'bg-primary',
                                    default     => 'bg-secondary',
                                };
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($status) }}</span>
                        </td>
                        <td>
                            <div class="btn-group flex-wrap" role="group">
                                {{-- Detail --}}
                                <a href="{{ route('user.bookings.show', $booking->id) }}" 
                                   class="btn btn-info btn-sm mb-1">Detail</a>

                                {{-- Edit --}}
                                <a href="{{ route('user.bookings.edit', $booking->id) }}" 
                                   class="btn btn-warning btn-sm mb-1">Edit</a>

                                {{-- Hapus --}}
                                <form action="{{ route('user.bookings.destroy', $booking->id) }}" 
                                      method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-danger btn-sm mb-1"
                                            onclick="return confirm('Yakin hapus booking ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
