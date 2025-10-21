<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    /**
     * Tampilkan semua booking aktif (pending/confirmed) milik user
     */
    public function index()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->whereNotIn('status', ['finished'])
            ->latest()
            ->get();

        return view('userbookings.index', compact('bookings'));
    }

    /**
     * Tampilkan history booking (sudah selesai)
     */
    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
            ->where('status', 'finished')
            ->latest()
            ->get();

        return view('userbookings.history', compact('bookings'));
    }

    /**
     * Form booking baru
     */
    public function create()
    {
        $services = Service::where('is_active', true)->get();
return view('userbookings.create', compact('services'));
    }

    /**
     * Simpan booking baru
     */
    public function store(Request $request)
    {
        // 🔒 Batasi maksimal booking aktif
        $activeBookings = Booking::where('user_id', Auth::id())
            ->whereIn('status', ['pending', 'confirmed'])
            ->count();

        // Validasi input
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'service_id' => ['required', 'exists:services,id'],
            'address'    => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:20'],
            'date'       => ['required', 'date', 'after_or_equal:today'],
        ]);

        // 🚫 Cegah duplikasi booking untuk service yang sama (selama belum finished)
        $existingBooking = Booking::where('user_id', Auth::id())
            ->where('service_id', $request->service_id)
            ->where('status', '!=', 'finished')
            ->first();

        if ($existingBooking) {
            return redirect()->route('user.bookings.index')
            ->with('error', 'Kamu sudah memiliki booking aktif untuk layanan ini. Selesaikan dulu sebelum memesan ulang.');
        }

        // ✅ Simpan booking baru
        Booking::create(array_merge($validated, [
            'user_id' => Auth::id(),
            'status'  => 'pending',
        ]));

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil dibuat.');
    }

    /**
     * Form edit booking milik sendiri
     */
    public function edit(Booking $booking)
    {
        $this->authorizeBooking($booking);

        $services = Service::all();
        return view('userbookings.edit', compact('booking', 'services'));
    }

    /**
     * Update booking milik sendiri
     */
    public function update(Request $request, Booking $booking)
    {
        $this->authorizeBooking($booking);

        $validated = $request->validate([
            'service_id' => ['required', 'exists:services,id'],
            'address'    => ['required', 'string', 'max:255'],
            'phone'      => ['required', 'string', 'max:20'],
            'date'       => ['required', 'date', 'after_or_equal:today'],
        ]);

        // 🚫 Cegah ubah ke service yang sudah dibooking aktif
        $duplicate = Booking::where('user_id', Auth::id())
            ->where('service_id', $request->service_id)
            ->where('status', '!=', 'finished')
            ->where('id', '!=', $booking->id)
            ->first();

        if ($duplicate) {
            return redirect()->back()->with('error', 'Kamu sudah memiliki booking aktif untuk layanan ini.');
        }

        $booking->update($validated);

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil diupdate.');
    }

    /**
     * Detail booking
     */
    public function show(Booking $booking)
    {
        $this->authorizeBooking($booking);

        return view('userbookings.show', compact('booking'));
    }

    /**
     * Klaim garansi booking
     */
    public function claimWarranty(Booking $booking)
    {
        $this->authorizeBooking($booking);

        if (!$booking->warranty_expires_at || $booking->warranty_expires_at->isPast()) {
            return back()->with('error', 'Booking tidak valid atau masa garansi sudah habis.');
        }

        $warrantyCode = 'WRNTY-' . strtoupper(Str::random(6));
        $adminPhone = "628123456789";
        $message = urlencode("Halo Admin, saya ingin klaim garansi dengan kode: {$warrantyCode} untuk booking ID {$booking->id}");

        return redirect("https://wa.me/{$adminPhone}?text={$message}");
    }

    /**
     * Hapus booking milik sendiri
     */
    public function destroy(Booking $booking)
    {
        $this->authorizeBooking($booking);

        $booking->delete();

        return redirect()->route('user.bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }

    /**
     * Cek apakah booking milik user yang sedang login
     */
    private function authorizeBooking(Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Akses ditolak: booking ini bukan milik Anda.');
        }
    }
}
