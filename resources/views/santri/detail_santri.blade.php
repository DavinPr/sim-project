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
<section class="account">
    <h2>Data pribadi santri</h2>
    <div class="card">
        <div class="card-body">
            <div class="account__image">
                <img src="@if($student->person->person_avatar == null)
                      {{ asset('img/insert-image.png') }}
                      @else
                      {{ asset('storage/avatar/'  . $student->person->person_avatar) }}
                      @endif" alt="Foto Diri" class="img-fluid">
                <div class="mt-3 ms-3">
                    <h5 class="card-title">{{$student->person->person_name}}</h5>
                    <p class="card-text">{{$student->nis}}</p>
                </div>
            </div>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h5>Tempat Lahir</h5>
                <p class="ms-3">{{$student->person->person_birthplace}}</p>
            </li>
            <li class="list-group-item">
                <h5>Tanggal Lahir Lahir</h5>
                <p class="ms-3">{{$student->person->person_birthdate}}</p>
            </li>
            <li class="list-group-item">
                <h5>Jenis Kelamin</h5>
                <p class="ms-3">{{$student->person->person_gender}}</p>
            </li>
        </ul>
    </div>
</section>
@endsection