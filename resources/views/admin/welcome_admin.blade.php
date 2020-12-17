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

    <!-- Styles -->
    <style>
     
        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

       
    </style>
</head>

<body>
   

    <div class="container-fluid wrapper">
<div class="row">
<div class="flex-center position-ref full-height">
        <div class="content">


            <div class="links">
                <a href="{{route('admin.add.santri.page')}}">Tambah Data Santri</a>
                <a href="{{route('admin.show.santri.page')}}">Lihat Data Santri</a>
                <a href="{{route('admin.show.admin.page')}}">Lihat Data Admin</a>
                <a href="{{route('admin.add.admin.page')}}">Tambah Data Admin</a>
            </div>
        </div>
    </div>
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

                <li>
                    <a class="menu-link" href="{{route('admin.show.santri.page')}}">
                        <span class="icon fas fa-list-alt"></span>
                        Data Santri
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
            Halo, {{$admin->person_name}}
            <a href="{{route('logout')}}">Logout</a>
            </li>
            
        </ul>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="profileSum">
                        <div class="profile-img">
                            <center><img src="/img/profile.jpg" alt="" srcset=""></center>
                            
                        </div>
                    </div>
                </div>

                <div class="col-8">

                </div>
            </div>
           
        </div>

    </div>

  </div>
</div>
    
</body>

</html>