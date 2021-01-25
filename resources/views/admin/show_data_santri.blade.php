@extends('admin/layout/main')


@section('title','Data Santri')
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
                <th scope="col">Gender</th>
                <th scope="col">SPP</th>
                <th colspan="3"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$student->nis}}</td>
                <td>{{$student->person->person_name}}</td>
                <td>{{$student->person->person_gender}}</td>
                <td>{{$student->spp}}</td>
                <td><a href="{{route('admin.detail.santri', $student->id)}}"> <i class="icon fas fa-info-circle"></i></a></td>
                <td><a href="{{route('admin.edit.santri', $student->id)}}"> <i class="icon fas fa-edit"></i></a></td>

                <td>
                    <form action="/santri/{{$student->id}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-none"> <i class="icon fas fa-trash-alt" type="submit"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <center>
        <a href="{{route('admin.add.santri.page')}}"> <button class="btn btn-primary">Tambahkan
                Santri</button></a>
    </center>
</div>

@endsection