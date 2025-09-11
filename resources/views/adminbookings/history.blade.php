@php
    use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
<div class="container">
    <h1 class="mb-4">Riwayat Booking</h1>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Tanggal Selesai</th>
                <th>Status</th>
                <th>Masa Garansi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name ?? '-' }}</td>
                    <td>{{ $booking->finished_at ? $booking->finished_at->format('d-m-Y H:i') : '-' }}</td>
                    
                    {{-- Status dengan warna dinamis --}}
                    <td>
                        <span class="badge
                            @if($booking->status === 'finished') bg-success
                            @elseif($booking->status === 'rejected') bg-danger
                            @elseif($booking->status === 'pending') bg-warning
                            @else bg-secondary
                            @endif">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>

                    {{-- Garansi --}}
                    <td>
                        @if($booking->warranty_expires_at && now()->lt($booking->warranty_expires_at))
                            <span class="text-success">
                                Berlaku sampai {{ $booking->warranty_expires_at->format('d-m-Y H:i') }}
                            </span>
                        @elseif($booking->warranty_expires_at)
                            <span class="text-danger">Garansi sudah habis</span>
                        @else
                            <span class="text-muted">Belum ada garansi</span>
                        @endif
                    </td>

                    {{-- Aksi --}}
                    <td>
                        @if($booking->warranty_expires_at && now()->lt($booking->warranty_expires_at))
                            @php
                                $warrantyCode = 'GARANSI-' . strtoupper(Str::random(8));
                                $message = urlencode("Halo Admin, saya ingin claim garansi dengan kode: $warrantyCode");
                            @endphp

                            <a href="https://wa.me/6285891673889?text={{ $message }}"
                               target="_blank"
                               class="btn btn-primary btn-sm">
                                Claim Garansi
                            </a>
                        @else
                            <span class="text-muted">Tidak tersedia</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada booking yang selesai.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
