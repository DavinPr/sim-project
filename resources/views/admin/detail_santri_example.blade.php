
@extends('admin/layout/main')


@section('title','Detail Santri')

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
        <li class="list-group-item">
            <form action="{{route('admin.santri.as.admin', $student->person->user->id)}}" method="POST">
                @method('put')
                @csrf
                <button type="submit">Change as admin</button>
            </form>
        </li>
    </ul>
</div>
@endsection

