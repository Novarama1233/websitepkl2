
<div class="container">
    <h3>Lupa Password</h3>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
        <button type="submit" class="btn btn-primary mt-2">Kirim Kode</button>
    </form>
</div>

