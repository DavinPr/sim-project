

@extends('admin/layout/main')


@section('title','Detail Transaksi')

@section('content')

<div class="content-item content-list">
    <h2>Verifikasi Pembayaran</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <P> <b>Nomer Transaksi</b> = {{$transaction->transaction_invoice}} </P>
    <p> <b>Tanggal Transaksi</b> = {{$transaction->created_at}} </p>
    <p> <b>Pembayaran</b> = {{$transaction->transaction_category}}</p>
    <p> <b>Nama Santri</b> = {{$transaction->student->person->person_name}}</p>
    <p> <b>Status</b> = {{$transaction->transaction_status}}</p>
    <p> <b>Diverifikasi oleh admin</b> =
        @if($transaction->admin != null)
        {{$transaction->admin->person->person_name}}
        @endif
    </p>
    <p> <b>Bukti Transaksi</b> = <img src="{{ asset('storage/proof/' . $transaction->transaction_proof) }}" alt="" width="200"></p>
    <br>
    <br>
    <form action="{{route('admin.transaksi.update', $transaction)}}" method="post">
        @method('put')
        @csrf
        <button type="submit" class="btn btn-success" name="verification" value="Terverifikasi">Terima</button>
        <button type="submit" class="btn btn-danger" name="verification" value="Ditolak">Tolak</button>
    </form>

</div>

@endsection

