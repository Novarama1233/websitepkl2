<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use Illuminate\Database\Console\Migrations\StatusCommand;

class BookingController extends Controller
{
    // Lihat semua booking
    public function index()
    {
        $bookings = Booking::all();
        return view('adminbookings.index', compact('bookings'));
    }

    // Konfirmasi booking
    public function confirm(Booking $booking)
{
    $booking->update(['status' => 'confirmed']);
    return back()->with('success', 'Booking berhasil dikonfirmasi!');
}
    // cancel konfir
    public function cancel(Booking $booking)
{
    $booking->update(['status' => 'pending']);
    return back()->with('success', 'Konfirmasi booking dibatalkan!');
}

    public function reject(Booking $booking)
    {
        $booking->update(['status' => 'reject']);
        return back()->with('success', 'Konfirmasi Booking Ditolak');
    }

    public function cancelreject(Booking $booking)
    {
        $booking->update(['status' => 'pending']);
        return back()->with('success', 'Reject dibataslkan');
    }

    // Edit booking
    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update($request->only(['title', 'date', 'status']));

        return redirect()->back()->with('success', 'Booking berhasil diupdate.');
    }

    // Hapus booking
    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking berhasil dihapus.');
    }
}
