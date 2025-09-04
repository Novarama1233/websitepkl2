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
        $bookings = Booking::where('user_id', Auth::id())->latest()->get();
        return view('userbookings.index', compact('bookings'));
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

        return back()->with('success', 'Booking berhasil dibuat.');
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
