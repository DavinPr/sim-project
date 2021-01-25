@extends('admin/layout/main')


@section('title','Edit Data')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('content')
<div class="content-item">

    <h3>Akun</h3>
    <form method="POST" action="{{route('admin.update.santri.user', $student->person->user->id)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{$student->nis}}" disabled>
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
    <form method="POST" action="{{route('admin.update.santri.person', $student->person_id)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="avatar" class="form-label">Foto</label>
            <input type="text" class="form-control" id="avatar" name="person_avatar" value="{{$student->person->person_avatar}}">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="name" name="person_name" value="{{$student->person->person_name}}">
        </div>
        <div class="mb-3">
            <label for="birthdate" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="birthdate" name="person_birthdate" value="{{$student->person->person_birthdate}}">
        </div>
        <div class="mb-3">
            <label for="birthplace" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="birthplace" name="person_birthplace" value="{{$student->person->person_birthplace}}">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="gender" name="person_gender" value="{{$student->person->person_gender}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>


    <h3 class="mt-5">Data santri</h3>
    <form method="POST" action="{{route('admin.update.santri.student', $student->id)}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="spp" class="form-label">SPP</label>
            <input type="number" class="form-control" id="spp" name="spp" value="{{$student->spp}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
@endsection