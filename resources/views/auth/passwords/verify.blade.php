
<div class="container">
    <h3>Verifikasi Kode</h3>
    <form action="{{ route('password.verify') }}" method="POST">
        @csrf
        <input type="text" name="token" class="form-control" placeholder="Masukkan kode OTP" required>
        <button type="submit" class="btn btn-success mt-2">Verifikasi</button>
    </form>
</div>
