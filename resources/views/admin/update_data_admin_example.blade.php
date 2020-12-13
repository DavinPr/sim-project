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

        <h3>Akun</h3>
        <form method="POST" action="{{route('admin.update.admin.user', $user->id)}}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{$user->username}}" disabled>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" , name="password">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>


        <h3 class="mt-5">Data diri</h3>
        <form method="POST" action="{{route('admin.update.admin.person', $user->person_id)}}">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="avatar" class="form-label">Foto</label>
                <input type="text" class="form-control" id="avatar" name="person_avatar" value="{{$user->person->person_avatar}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="person_name" value="{{$user->person->person_name}}">
            </div>
            <div class="mb-3">
                <label for="birthdate" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="birthdate" name="person_birthdate" value="{{$user->person->person_birthdate}}">
            </div>
            <div class="mb-3">
                <label for="birthplace" class="form-label">Tempat Lahir</label>
                <input type="text" class="form-control" id="birthplace" name="person_birthplace" value="{{$user->person->person_birthplace}}">
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Jenis Kelamin</label>
                <input type="text" class="form-control" id="gender" name="person_gender" value="{{$user->person->person_gender}}">
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</body>

</html>