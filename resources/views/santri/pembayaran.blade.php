@extends('santri/layout/main')


@section('title','Ajukan Pembayaran')

@section('content')

<h2>Pembayaran</h2>
<div class="content-item">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>

    @endif
    <form method="POST" action="{{ route('santri.pembayaran', $bill) }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="fee" class="form-label">Jumlah Nominal</label>
            <input type="number" class="form-control" id="fee" name="fee" value="{{$bill->bill_fee}}">
        </div>
        <div class="mb-3">
            <div class="form-group">
                <label for="category">Pilih Jenis Pembayaran</label>
                <select class="form-control" id="category" name="category">
                    <option>- Pilih -</option>
                    <option value="SPP" @if($bill->bill_category == 'SPP') selected @endif>SPP</option>
                    <option value="Kas" @if($bill->bill_category == 'Kas') selected @endif>Kas</option>
                    <option value="Daftar Ulang" @if($bill->bill_category == 'Daftar Ulang') selected @endif>Daftar Ulang</option>
                    <option value="Sumbangan" @if($bill->bill_category == 'Sumbangan') selected @endif>Sumbangan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="proof">Upload Bukti Pembayaran</label>
            <br>
            <input type="file" id="proof" name="proof" accept="image/png, image/jpeg">

        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>

</div>
@endsection