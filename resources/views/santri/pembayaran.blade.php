<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">
    <script src="https://kit.fontawesome.com/543ccfb2d9.js" crossorigin="anonymous"></script>


</head>

<body>

    <div class="container-fluid wrapper">
        <div class="row">

            <div class="col-3 sidebar">
                <div class="container">
                    <div class="logo d-flex justify-content-center">
                        <img src="/img/logo.png" alt="" srcset="">
                    </div>
                </div>

                <div class="container">
                    <div class="menus">

                        <ul class="menus-block">
                            <li>
                                <a class="menu-link" href="{{route('santri.homepage')}}">
                                    <span class="icon fas fa-home"></span>
                                    Beranda
                                </a>
                            </li>
                            <li>
                                <a class="menu-link" href="#">
                                    <span class="icon fas fa-user-circle"></span>
                                    Akun
                                </a>
                            </li>
                            <li>
                                <a class="menu-link" href="#">
                                    <span class="icon fas fa-history"></span>
                                    Transaksi
                                </a>
                            </li>

                            <li>
                                <a class="menu-link" href="#">
                                    <span class="icon fas fa-file-alt"></span>
                                    Laporan
                                </a>
                            </li>



                        </ul>

                    </div>
                </div>
            </div>


            <div class="col-9 main-wrapper">
                <div class="container">
                    <ul class="nav justify-content-end nav-top">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                <span class="nav-icon fas fa-bell"></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span class="nav-icon fas fa-cog"></span>
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="container content-item">
                    <div class="container mt-4">
                        <h1>Pembayaran</h1>
                        <br>
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        <br>
                        <form method="POST" action="{{ route('santri.pembayaran', $user_auth->person->student->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="fee" class="form-label">Jumlah Nominal</label>
                                <input type="number" class="form-control" id="fee" name="fee">
                            </div>
                            <div class="mb-3">
                                <div class="form-group">
                                    <label for="category">Pilih Jenis Pembayaran</label>
                                    <select class="form-control" id="category" name="category">
                                        <option selected>- Pilih -</option>
                                        <option value="SPP">SPP</option>
                                        <option value="Kas">Kas</option>
                                        <option value="Daftar Ulang">Daftar Ulang</option>
                                        <option value="Sumbangan">Sumbangan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="proof">Upload Bukti Pembayaran</label>
                                <br>
                                <input type="file" id="proof" name="proof" accept="image/png, image/jpeg">

                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
</body>

</html>