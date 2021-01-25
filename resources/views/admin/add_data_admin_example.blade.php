@extends('admin/layout/main')


@section('title','Tambahkan Admin')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('content')

<div class="content-item">
    <form method="POST" action="{{ route('admin.create.admin') }}">
        @csrf
        <div class="mb-3">
            <label for="username" class="form-label">Username <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password <span style="color: red;">*</span></label>
            <input type="password" class="form-control" id="password" , name="password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="name" name="person_name">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Tanggal Lahir <span style="color: red;">*</span></label>
            <input type="date" class="form-control" id="birthdate" name="person_birthdate">
        </div>
        <div class="mb-3">
            <label for="birthplace" class="form-label">Tempat Lahir <span style="color: red;">*</span></label>
            <input type="text" class="form-control" id="birthplace" name="person_birthplace">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin <span style="color: red;">*</span></label>
            <br>

            <input type="radio" id="male" name="person_gender" value="Laki-laki">
            <label for="male">Laki-laki</label><br>
            <input type="radio" id="female" name="person_gender" value="Perempuan">
            <label for="female">Perempuan</label><br>
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="avatar" name="person_avatar">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection