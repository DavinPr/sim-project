@extends('admin/layout/main')


@section('title','Edit Data')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('profile')
@if($user->person->person_avatar != null)
{{ asset('storage/avatar/' . $user->person->person_avatar  )}}
@else
{{ asset('img/profile.jpg') }}
@endif
@endsection

@section('content')
<div class="content-item">

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
@endsection