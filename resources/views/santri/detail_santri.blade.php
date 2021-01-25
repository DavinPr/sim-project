@extends('santri/layout/main')

@section('title','Detail Santri')
@section('name')
{{ $user_auth->person->person_name }}
@endsection

@section('profile')
@if($user_auth->person->person_avatar != null)
{{ asset('storage/avatar/' . $user_auth->person->person_avatar  )}}
@else
{{ asset('img/profile.jpg') }}
@endif
@endsection

@section('content')
<div class="content-item">
    <ul class="list-group">
        <li class="list-group-item">NIS = {{$student->nis}}</li>
        <li class="list-group-item">SPP = {{$student->spp}}</li>

        <!-- Accessing table person from table student -->
        <li class="list-group-item">Nama = {{$student->person->person_name}}</li>
        <li class="list-group-item">Tanggal lahir = {{$student->person->person_birthdate}}</li>
        <li class="list-group-item">Tempat lahir = {{$student->person->person_birthplace}}</li>
        <li class="list-group-item">Jenis Kelamin = {{$student->person->person_gender}}</li>

        <!-- Accessing table user from table student -->
        <li class="list-group-item">Username = {{$student->person->user->username}}</li>
        <li class="list-group-item">Password = {{$student->person->user->password}}</li>
    </ul>
</div>
@endsection