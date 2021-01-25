@extends('santri/layout/main')


@section('title','Transaksi')


@section('content')

<h2>Transaksi Santri</h2>
<div class="content-item">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No. Transaksi</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bills as $bill)
            <tr>
                <th scope="row"><a href="{{route('santri.add.pembayaran', $bill)}}">{{$bill->bill_number}}</a></th>
                <td>{{$bill->created_at}}</td>
                <td>{{$bill->bill_category}}</td>
                <td>{{$bill->bill_fee}}</td>
                <td @if($bill->bill_status == 'Belum dibayar') class="gagal" @else class="sukses" @endif>{{$bill->bill_status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection