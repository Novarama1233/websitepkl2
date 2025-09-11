<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    // Lihat semua booking yang belum selesai
    public function index()
    {
        $bookings = Booking::where('status', '!=', 'finished')->get();
        return view('adminbookings.index', compact('bookings'));
    }

    // Riwayat booking selesai
    public function history()
    {
        $bookings = Booking::where('status', 'finished')->get();
        return view('adminbookings.history', compact('bookings'));
    }

    // Konfirmasi booking
    public function confirm(Booking $booking)
    {
        $booking->update(['status' => 'confirmed']);
        return back()->with('success', 'Booking berhasil dikonfirmasi!');
    }

    // Batalkan konfirmasi
    public function cancel(Booking $booking)
    {
        $booking->update(['status' => 'pending']);
        return back()->with('success', 'Konfirmasi booking dibatalkan!');
    }

    // Tolak booking
    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'rejected']);
        return back()->with('success', 'Booking ditolak.');
    }

    // Batalkan penolakan
    public function cancelReject(Booking $booking)
    {
        $booking->update(['status' => 'pending']);
        return back()->with('success', 'Penolakan booking dibatalkan.');
    }

    // Edit booking (hanya judul & tanggal)
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['title', 'date', 'status']));
        return redirect()->back()->with('success', 'Booking berhasil diupdate.');
    }

    // Tandai booking selesai + aktifkan garansi
    public function finish(Booking $booking)
    {
        $booking->update([
            'status'=> 'finished',
            'finished_at' => now(),
            'warranty_expires_at' => now()->addDays(7),
            'warranty_code' => strtoupper(uniqid('WRNTY'))
        ]);

        return back()->with('success', 'Booking ditandai sudah selesai! Garansi aktif selama 7 hari.');
    }

    // Hapus booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();
        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }
}
