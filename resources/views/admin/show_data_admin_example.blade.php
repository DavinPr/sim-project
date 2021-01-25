@extends('admin/layout/main')


@section('title','Data Admin')
@section('name')
{{ $user->person->person_name }}
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
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">Nama</th>
                <th colspan="3"></th>

            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td><a href="{{route('admin.detail.admin', $admin->id)}}">{{$admin->username}}</a></td>
                <td>{{$admin->person->person_name}}</td>

                <td><a href="{{route('admin.detail.admin', $admin->id)}}"> <i class="icon fas fa-info-circle"></i></a></td>
                <td><a href="{{route('admin.edit.admin', $admin->id)}}"> <i class="icon fas fa-edit"></i></a></td>

                <td>
                    <form action="/admin/{{$admin->person_id}}" method="POST">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn-none"> <i class="icon fas fa-trash-alt" type="submit"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{route('admin.add.admin.page')}}"> <button class="btn btn-primary">Tambahkan
            Admin</button></a>
</div>

@endsection