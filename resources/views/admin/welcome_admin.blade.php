
@extends('admin/layout/main')


@section('title','Sistem Pembayaran Pondok Pesantren')



@section('content')

    <h2>Beranda</h2>
    <div class="item">

        <a class="itemlist" href="{{route('admin.show.admin.page')}}">
            <span class="icon fas fa-user"></span>
            Data Admin
        </a>

        <a class="itemlist" href="{{route('admin.show.santri.page')}}">
            <span class="icon fas fa-list-alt"></span>
            Data Santri
        </a>

    </div>

    <div class="transaksi">
        <h2>Transaksi Terbaru</h2>
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

                    @foreach($transactions->take(3) as $transaction)
                    <tr>
                        <th scope="row">{{$transaction->transaction_invoice}}</th>
                        <td>{{$transaction->created_at}}</td>
                        <td>{{$transaction->transaction_category}}</td>
                        <td>{{$transaction->transaction_fee}}</td>
                        <td @if($transaction->transaction_status == 'Belum diverifikasi') class="pending"
                            @elseif($transaction->transaction_status == 'Ditolak') class="gagal" @else class="sukses"
                            @endif>{{$transaction->transaction_status}}</td>
                    </tr>
                    @endforeach

                </tbody>

            </table>
            <center>
                <a href="{{route('admin.show.transaksi')}}"> <button class="btn btn-primary">Lihat Semuanya</button></a>
            </center>
        </div>
    </div>

@endsection