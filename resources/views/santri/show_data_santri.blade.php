@extends('santri/layout/main')


@section('title','Sistem Pembayaran Pondok Pesantren')

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
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Tempat lahir</th>
                <th scope="col">Gender</th>
                <th scope="col">SPP</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$student->nis}}</td>
                <td>{{$student->person->person_name}}</td>
                <td>{{$student->person->person_birthdate}}</td>
                <td>{{$student->person->person_birthplace}}</td>
                <td>{{$student->person->person_gender}}</td>
                <td>{{$student->spp}}</td>
                <td><a href="{{ route('santri.profile', $student) }}">Click</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection