<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    // ======================
    // 1. Form input email
    // ======================
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    // ======================
    // 2. Kirim kode OTP
    // ======================
    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999); // kode OTP 6 digit

        // simpan ke tabel password_reset_tokens
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $otp,
                'created_at' => Carbon::now()
            ]
        );

        // kirim email
        Mail::raw("Kode reset password kamu adalah: $otp", function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Kode Reset Password');
        });

        // simpan email ke session
        session(['reset_email' => $request->email]);

        // langsung arahkan ke form OTP
        return redirect()->route('password.verify.form')
            ->with('success', 'Kode verifikasi sudah dikirim ke email Anda.');
    }

    // ======================
    // 3. Form input kode OTP
    // ======================
    public function showVerifyForm()
    {
        return view('auth.passwords.verify');
    }

    // ======================
    // 4. Verifikasi kode OTP
    // ======================
    public function verifyCode(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);

        $email = session('reset_email');
        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        // validasi token & expiry (10 menit)
        if ($record && 
            $record->token == $request->token && 
            Carbon::parse($record->created_at)->addMinutes(10)->isFuture()) 
        {
            session(['reset_verified' => true]);

            return redirect()->route('password.reset.form')
                ->with('success', 'Kode benar, silakan buat password baru.');
        }

        return back()->withErrors(['token' => 'Kode OTP salah atau sudah kadaluarsa.']);
    }

    // ======================
    // 5. Form reset password
    // ======================
    public function showResetForm()
    {
        if (!session('reset_verified')) {
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Harap masukkan email Anda terlebih dahulu.']);
        }

        return view('auth.passwords.reset');
    }

    // ======================
    // 6. Update password user
    // ======================
    public function reset(Request $request)
{
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);

    $email = session('reset_email'); // ambil email dari session
    $user = User::where('email', $email)->first();

    if ($user) {
        $user->password = Hash::make($request->password);
        $user->save();

        // hapus token & session
        DB::table('password_reset_tokens')->where('email', $email)->delete();
        session()->forget(['reset_email', 'reset_verified']);

        // redirect ke login user
        return redirect('/user/login')->with('success', 'Password berhasil diubah. Silakan login dengan password baru.');
    }

    return back()->with('error', 'Gagal reset password, coba lagi.');
    }
}