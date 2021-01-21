
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
                @foreach($transactions as $transaction)
                <tr>
                    <th scope="row"><a href="">{{$transaction->transaction_invoice}}</a></th>
                    <td>{{$transaction->created_at}}</td>
                    <td>{{$transaction->transaction_category}}</td>
                    <td>{{$transaction->transaction_fee}}</td>
                    <td @if($transaction->transaction_status == 'Belum diverifikasi') class="pending" @elseif($transaction->transaction_status == 'Ditolak') class="gagal" @else class="sukses" @endif>{{$transaction->transaction_status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection

