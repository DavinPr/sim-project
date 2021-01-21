
@extends('admin/layout/main')


@section('title','Detail Admin')

@section('content')
<div class="content-item">
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
@endsection

