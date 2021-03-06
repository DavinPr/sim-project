@extends('santri/layout/main')


@section('title','Transaksi')
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

<h2>Tagihan Santri</h2>
<div class="content-item">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No. Tagihan</th>
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