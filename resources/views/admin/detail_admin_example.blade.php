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
    <div class="container mt-4">
        <ul class="list-group">
            <!-- Accessing table person from table student -->
            <li class="list-group-item">Nama = {{$user->person->person_name}}</li>
            <li class="list-group-item">Tanggal lahir = {{$user->person->person_birthdate}}</li>
            <li class="list-group-item">Tempat lahir = {{$user->person->person_birthplace}}</li>
            <li class="list-group-item">Jenis Kelamin = {{$user->person->person_gender}}</li>

            <!-- Accessing table user from table student -->
            <li class="list-group-item">Username = {{$user->username}}</li>
            <li class="list-group-item">Password = {{$user->password}}</li>
        </ul>
    </div>
</body>

</html>