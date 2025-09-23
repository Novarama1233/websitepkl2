<div class="container">
    <h3>Ganti Password</h3>

    {{-- Tampilkan pesan sukses/error --}}
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <a href="{{ route('userlogin') }}" class="btn btn-success mt-2">
            Pergi ke Login
        </a>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('user.password.reset') }}" method="POST">
        @csrf
        <input type="password" name="password" class="form-control" placeholder="Password baru" required>
        <input type="password" name="password_confirmation" class="form-control mt-2" placeholder="Konfirmasi password" required>
        <button type="submit" class="btn btn-primary mt-2">Simpan Password</button>
    </form>
</div>
