@extends('admin/layout/main')


@section('title','Tambahkan Santri')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('content')
<div class="content-item">
    <form method="POST" action="{{ route('admin.create.santri') }}">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" , name="password">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="person_name">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="birthdate" name="person_birthdate">
        </div>
        <div class="mb-3">
            <label for="birthplace" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="birthplace" name="person_birthplace">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
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
            <label for="spp" class="form-label">SPP</label>
            <input type="number" class="form-control" id="spp" name="spp">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection