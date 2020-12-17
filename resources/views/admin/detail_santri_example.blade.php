<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

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
                                    <a class="menu-link" href="#">
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
                        <p class='nav justify-content-end nav-p'> Halo, {{$student->person->person_name}}</p>
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
                                <a href="{{route('logout')}}">Logout</a>
                            </li>

                        </ul>
                    </div>

                    <div class="container content">
                        <div class="container content-item">
                            <ul class="list-group">
                                <li class="list-group-item">NIS = {{$student->nis}}</li>
                                <li class="list-group-item">SPP = {{$student->spp}}</li>

                                <!-- Accessing table person from table student -->
                                <li class="list-group-item">Nama = {{$student->person->person_name}}</li>
                                <li class="list-group-item">Tanggal lahir = {{$student->person->person_birthdate}}</li>
                                <li class="list-group-item">Tempat lahir = {{$student->person->person_birthplace}}</li>
                                <li class="list-group-item">Jenis Kelamin = {{$student->person->person_gender}}</li>

                                <!-- Accessing table user from table student -->
                                <li class="list-group-item">Username = {{$student->person->user->username}}</li>
                                <li class="list-group-item">Password = {{$student->person->user->password}}</li>
                                <li class="list-group-item">
                                    <form action="{{route('admin.santri.as.admin', $student->person->user->id)}}"
                                        method="POST">
                                        @method('put')
                                        @csrf
                                        <button type="submit">Change as admin</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </body>

    </html>
</body>

</html>