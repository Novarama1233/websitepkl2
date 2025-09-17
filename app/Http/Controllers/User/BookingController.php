<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Lihat booking milik user (hanya aktif, belum finished)
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->whereNotIn('status', ['finished'])
            ->get();

        return view('userbookings.index', compact('bookings'));
    }

    // Lihat history booking (sudah selesai, tampilkan semua meskipun garansi habis)
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->where('status', 'finished')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('userbookings.history', compact('bookings'));
    }

    // Form booking baru
    public function create()
    {
        return view('userbookings.create');
    }

    // Simpan booking baru
    public function store(Request $request)
    {
        $activeBookings = Booking::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        if ($activeBookings >= 3) {
            return redirect()->route('user.bookings.index')
                ->with('error', 'Anda sudah memiliki 3 booking aktif. Selesaikan dulu sebelum membuat booking baru.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'date'  => 'required|date|after_or_equal:today',
        ]);

        Booking::create([
            'user_id' => Auth::id(),
            'title'   => $request->title,
            'date'    => $request->date,
            'status'  => 'pending',
        ]);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    // Edit booking milik sendiri
    public function edit(Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Tidak bisa edit booking orang lain.');
        }

        return view('userbookings.edit', compact('booking'));
    }

    // Update booking milik sendiri
    public function update(Request $request, Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Tidak bisa edit booking orang lain.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date'  => ['required', 'date'],
        ]);

        $booking->update($validated);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil diupdate.');
    }

    // Detail booking
    public function show(Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Tidak bisa melihat booking orang lain.');
        }

        return view('userbookings.show', compact('booking'));
    }

    // Klaim garansi booking
    public function claimWarranty(Booking $booking)
    {
        if (
            (int) $booking->user_id !== (int) Auth::id() ||
            !$booking->warranty_expires_at ||
            $booking->warranty_expires_at->isPast()
        ) {
            return back()->with('error', 'Booking tidak valid atau masa garansi sudah habis.');
        }

        // Generate kode garansi unik (sekali pakai, tidak disimpan)
        $warrantyCode = strtoupper(uniqid('WRNTY'));

        // Nomor WhatsApp admin (format internasional tanpa +)
        $adminPhone = "628123456789";

        // Pesan otomatis
        $message = urlencode("Halo Admin, saya ingin klaim garansi dengan kode: {$warrantyCode} untuk booking ID {$booking->id}");

        // Redirect ke WhatsApp
        return redirect("https://wa.me/{$adminPhone}?text={$message}");
    }

    // Hapus booking milik sendiri
    public function destroy(Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Tidak bisa hapus booking orang lain.');
        }

        $booking->delete();

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}
