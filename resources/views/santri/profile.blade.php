
@extends('santri/layout/main')


@section('title','Sistem Pembayaran Pondok Pesantren')

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
           
        </tbody>
    </table>
</div>
@endsection

