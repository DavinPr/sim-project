@extends('admin/layout/main')


@section('title','Detail Transaksi')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('profile')
@if($user->person->person_avatar != null)
{{ asset('storage/avatar/' . $user->person->person_avatar  )}}
@else
{{ asset('img/profile.jpg') }}
@endif
@endsection

@section('content')

<div class="content-item content-list">
    <h2>Verifikasi Pembayaran</h2>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <P> <b class="dt">Nomer Transaksi</b>  {{$transaction->transaction_invoice}} </P>
    <p> <b class="dt">Tanggal Transaksi</b>  {{$transaction->created_at}} </p>
    <p> <b class="dt">Pembayaran</b>  {{$transaction->transaction_category}}</p>
    <p> <b class="dt">Nama Santri</b>  {{$transaction->student->person->person_name}}</p>
    <p> <b class="dt">Status</b>  {{$transaction->transaction_status}}</p>
    <p> <b class="dt">Diverifikasi oleh admin</b> 
        @if($transaction->admin != null)
        {{$transaction->admin->person->person_name}}
        @endif
    </p>
    <p> <b class="dt">Bukti Transaksi</b> 
        
        <br>
        <div class="img"> <img src="{{ asset('storage/proof/' . $transaction->transaction_proof) }}" alt="" width="200"></div>
       </p>
       
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

