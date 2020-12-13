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
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal lahir</th>
                    <th scope="col">Tempat lahir</th>
                    <th scope="col">Gender</th>
                    <th scope="col">SPP</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$student->nis}}</td>
                    <td>{{$student->person->person_name}}</td>
                    <td>{{$student->person->person_birthdate}}</td>
                    <td>{{$student->person->person_birthplace}}</td>
                    <td>{{$student->person->person_gender}}</td>
                    <td>{{$student->spp}}</td>
                    <td><a href="/santri/{{$student->id}}">Click</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>