@extends('layouts.app')

@section('title', 'Data Booking')

@section('content')
<div class="container">
    <h1 class="mb-4 text-center">Daftar Bookings</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Form Search --}}
    <form action="{{ route('admin.bookings.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" 
                   placeholder="Cari nama user / service / telepon..."
                   value="{{ request('search') }}">
            <button type="submit" class="btn btn-primary">Cari</button>
            @if(request('search'))
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-secondary">Reset</a>
            @endif
        </div>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th class="d-none d-md-table-cell">ID</th>
                    <th>Nama User</th>
                    <th class="d-none d-md-table-cell">Alamat</th>
                    <th>No. Telepon</th>
                    <th>Service</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td class="d-none d-md-table-cell">{{ $booking->id }}</td>
                        <td class="text-wrap">{{ $booking->user->name ?? '-' }}</td>
                        <td class="d-none d-md-table-cell text-wrap">{{ $booking->address ?? '-' }}</td>
                        <td>{{ $booking->phone ?? '-' }}</td>
                        <td>{{ $booking->service->title ?? '-' }}</td>
                        <td>{{ $booking->date ? \Carbon\Carbon::parse($booking->date)->format('d-m-Y') : '-' }}</td>
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
                                @if($booking->status === 'pending')
                                    <form action="{{ route('admin.bookings.confirm', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm mb-1">Konfirmasi</button>
                                    </form>
                                    <form action="{{ route('admin.bookings.reject', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm mb-1">Tolak</button>
                                    </form>
                                @elseif($booking->status === 'confirmed')
                                    <form action="{{ route('admin.bookings.cancel', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm mb-1">Batalkan</button>
                                    </form>
                                @elseif($booking->status === 'reject')
                                    <form action="{{ route('admin.bookings.cancelreject', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm mb-1">Batalkan</button>
                                    </form>
                                @endif

                                @if($booking->status !== 'finished')
                                    <form action="{{ route('admin.bookings.finish', $booking->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm mb-1">Selesai</button>
                                    </form>
                                @endif

                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mb-1"
                                        onclick="return confirm('Yakin hapus booking ini?')">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada booking</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
