

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
        
        <form method="POST" action="{{ route('santri.pembayaran', $user_auth->person->student->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="fee" class="form-label">Jumlah Nominal</label>
                <input type="number" class="form-control" id="fee" name="fee">
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label for="category">Pilih Jenis Pembayaran</label>
                    <select class="form-control" id="category" name="category">
                        <option selected>- Pilih -</option>
                        <option value="SPP">SPP</option>
                        <option value="Kas">Kas</option>
                        <option value="Daftar Ulang">Daftar Ulang</option>
                        <option value="Sumbangan">Sumbangan</option>
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

