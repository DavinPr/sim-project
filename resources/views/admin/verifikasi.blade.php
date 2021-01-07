<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
                                <a class="menu-link" href="{{route('admin.verifikasi')}}">
                                    <span class=" icon fas fa-check-square"></span>
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

                    </ul>
                </div>

                <div class="container">
                    <h2>Belum Terverifikasi</h2>
                    <div class="content-item">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">No. Transaksi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Status</th>


                                </tr>
                            </thead>
                            <tbody>


                                <tr>
                                    <th scope="row">#899</th>
                                    <td>4 April 2021</td>
                                    <td>Pembayaran SPP</td>
                                    <td>100000</td>
                                    <td class="pending">Belum Terverifikasi</td>
                                </tr>
                                <tr>
                                    <th scope="row">#899</th>
                                    <td>4 April 2021</td>
                                    <td>Pembayaran SPP</td>
                                    <td>100000</td>
                                    <td class="pending">Belum Terverifikasi</td>
                                </tr>
                                <tr>
                                    <th scope="row">#899</th>
                                    <td>4 April 2021</td>
                                    <td>Pembayaran SPP</td>
                                    <td>100000</td>
                                    <td class="pending">Belum Terverifikasi</td>
                                </tr>
                                <tr>
                                    <th scope="row">#899</th>
                                    <td>4 April 2021</td>
                                    <td>Pembayaran SPP</td>
                                    <td>100000</td>
                                    <td class="pending">Belum Terverifikasi</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>

</html>