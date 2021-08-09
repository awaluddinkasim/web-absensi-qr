<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Siswa</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
</head>
<body>
    <div class="container-login">
        <div class="login-area">
            <form class="login-box" method="POST" action="">
                @csrf
                <h1>Login</h1>
                <input type="text" name="username" placeholder="Username" autocomplete="off" required>
                <input type="password" name="password" placeholder="Password" required>

                <button class="btn-login">Masuk</button>
                <div class="text-center mt-2">
                    <a href="/guru/login">Masuk sebagai Guru</a>
                </div>
            </form>
        </div>
        <div class="img-area">
            <img src="{{ asset('img/siswa.svg') }}" alt="img">
        </div>
    </div>
</body>
</html>
