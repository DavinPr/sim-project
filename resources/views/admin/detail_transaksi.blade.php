<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
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
                                    <a class="menu-link" href="{{route('admin.homepage')}}">
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
                                    <a class="menu-link" href="{{route('admin.show.transaksi')}}">
                                        <span class="icon fas fa-history"></span>
                                        Transaksi
                                    </a>
                                </li>

                                <li>
                                    <a class="menu-link" href="#">
                                        <span class="icon fas fa-check-square"></span>
                                        Verifikasi
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
                        <p class='nav justify-content-end nav-p'> </p>
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
                            <li class="nav-item">
                                <a href="{{route('logout')}}"><span class="nav-icon fas fa-sign-out-alt"></span></a>
                            </li>

                        </ul>
                    </div>

                    <div class="container content">
                        <div class="container content-item content-list">
                            <h2>Verifikasi Pembayaran</h2>
                            @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                            @endif
                            <P> <b>Nomer Transaksi</b> = {{$transaction->transaction_invoice}} </P>
                            <p> <b>Tanggal Transaksi</b> = {{$transaction->created_at}} </p>
                            <p> <b>Pembayaran</b> = {{$transaction->transaction_category}}</p>
                            <p> <b>Nama Santri</b> = {{$transaction->student->person->person_name}}</p>
                            <p> <b>Status</b> = {{$transaction->transaction_status}}</p>
                            <p> <b>Diverifikasi oleh admin</b> =
                                @if($transaction->admin != null)
                                {{$transaction->admin->person->person_name}}
                                @endif
                            </p>
                            <p> <b>Bukti Transaksi</b> = <img src="{{ asset('storage/proof/' . $transaction->transaction_proof) }}" alt="" width="200"></p>
                            <br>
                            <br>
                            <form action="{{route('admin.transaksi.update', $transaction)}}" method="post">
                                @method('put')
                                @csrf
                                <button type="submit" class="btn btn-success" name="verification" value="Terverifikasi">Terima</button>
                                <button type="submit" class="btn btn-danger" name="verification" value="Ditolak">Tolak</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </body>

    </html>
</body>

</html>