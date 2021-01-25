@extends('admin/layout/main')


@section('title','Laporan Pembayaran Santri')
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
                <th scope="col">#</th>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Lihat Laporan</th>

            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{$student->nis}}</td>
                <td>{{$student->person->person_name}}</td>
                <td>Lihat</td>
                @endforeach
        </tbody>
    </table>
</div>

@endsection