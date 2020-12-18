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
                                <a class="menu-link" href="#">
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

                <div class="container content-item">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nama</th>
                                <th colspan="3"></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td><a href="{{route('admin.detail.admin', $admin->id)}}">{{$admin->username}}</a></td>
                                <td>{{$admin->person->person_name}}</td>
                               
                                <td><a href="{{route('admin.detail.admin', $admin->id)}}"> <i class="icon fas fa-info-circle"></i></a></td>
                                <td><a href="{{route('admin.edit.admin', $admin->id)}}"> <i class="icon fas fa-edit"></i></a></td>
                    
                                <td>
                                    <form action="/admin/{{$admin->person_id}}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn-none"> <i class="icon fas fa-trash-alt" type="submit"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{route('admin.add.admin.page')}}"> <button class="btn btn-primary">Tambahkan
                            Admin</button></a>
                </div>



            </div>

        </div>
    </div>
</body>

</html>