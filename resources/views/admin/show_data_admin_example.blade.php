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
                    <th scope="col">Username</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tanggal lahir</th>
                    <th scope="col">Tempat lahir</th>
                    <th scope="col">Gender</th>
                    <th>Detail</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$admin->username}}</td>
                    <td>{{$admin->person->person_name}}</td>
                    <td>{{$admin->person->person_birthdate}}</td>
                    <td>{{$admin->person->person_birthplace}}</td>
                    <td>{{$admin->person->person_gender}}</td>
                    <td><a href="{{route('admin.detail.admin', $admin->id)}}">Click</a></td>
                    <td><a href="{{route('admin.edit.admin', $admin->id)}}">Click</a></td>
                    <td>
                        <form action="/admin/{{$admin->person_id}}" method="POST">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>