<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Lihat booking milik user
    public function index()
    {
    // hanya tampilkan booking yang statusnya belum "finished"
    $bookings = Booking::where('user_id', Auth::id())
                   ->whereNotIn('status', ['finished'])
                   ->get();


    return view('userbookings.index', compact('bookings'));
    }

    public function history()
    {
        $bookings = Booking::where('user_id', Auth::id())
                   ->where('status', 'finished')
                   ->get();

        return view('userbookings.history', compact('bookings'));
    }

    
    public function create()
    {
        return view('userbookings.create');
    }

    // Buat booking baru
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'date'  => ['required', 'date'],
    ]);

    Booking::create([
        'user_id' => Auth::id(),
        'title'   => $validated['title'],
        'date'    => $validated['date'],
        'status'  => 'pending',
    ]);

    return redirect()->route('user.bookings.index')
                     ->with('success', 'Booking berhasil dibuat!');
}


    // Edit booking milik sendiri
    public function edit(Booking $booking)
    {
        return view('userbookings.edit', compact('booking'));
    }
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

        return redirect('user/bookings')->with('success', 'Booking berhasil diupdate.');
    }
    public function show(Booking $booking)
    {
        if ((int) $booking->user_id !== (int) Auth::id()) {
            abort(403, 'Tidak bisa melihat booking orang lain.');
        }

        return view('userbookings.show', compact('booking'));
    }

    public function claimWarranty(Booking $booking)
{
    // Cek kalau garansi masih berlaku{
    if ((int) $booking->user_id !== (int) Auth::id() 
        || !$booking->warranty_expires_at 
        || $booking->warranty_expires_at->isPast()) {
        
        return back()->with('error', 'Booking tidak valid atau masa garansi sudah habis.');
    }

    // Generate kode garansi unik (hanya sekali pakai di WhatsApp, tidak disimpan)
    $warrantyCode = strtoupper(uniqid('WRNTY'));

    // Nomor WhatsApp admin (ubah ke nomor adminmu)
    $adminPhone = "628123456789"; // format internasional tanpa +
    
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

        return back()->with('success', 'Booking berhasil dihapus.');
    }
}
