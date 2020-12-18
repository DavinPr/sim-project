<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="stylesheet" href="/css/login.css">


    <title>Hello, world!</title>
</head>

<body>
    <div class="container wrapper">
        <div class="row">
            <div class="col-6 kiri">
                <div class="judul">Sistem Pembayaran Pondok Pesantren Al-Munawwir Komplek L</div>
                <div class="logo d-flex justify-content-center">
                    <img src="/img/logo.png" alt="" srcset="">
                </div>
            </div>


            <div class="col-6 kanan">
                <h2>Log in</h2>
                <p>Masukan NIS dan Password untuk masuk</p>
                @if (session('invalid'))
                <div class="alert alert-danger">
                    {{ session('invalid') }}
                </div>
                @endif
                @if (session('logout'))
                <div class="alert alert-success">
                    {{ session('logout') }}
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">NIS</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <center><button type="submit" class="btn btn-login">Log in</button></center>

                </form>
            </div>
        </div>

</body>

</html>