@extends('admin/layout/main')


@section('title','Sistem Pembayaran Pondok Pesantren')
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

<h2>Buat Tagihan</h2>
<div class="content-item">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('admin.push.bill') }}">
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
            <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
    </form>

</div>

@endsection