@extends('santri/layout/main')


@section('title','Buat Akun')
@section('name')
{{ $user->person->person_name }}
@endsection

@section('content')
<section class="account">
  <h2>Form Buat Akun</h2>
  <div class="card">
    <div class="card-body">
      <form action="" id="accountForm">
        <div class="form-group">
          <label class="control-label mb-3" for="image">Foto Diri</label>
          <div class="account__image">
            <img src="@if($user->person->person_avatar == null)
                      {{ asset('img/insert-image.png') }}
                      @else
                      {{ $user->person->person_avatar}}
                      @endif" alt="Foto Diri" class="img-fluid">
            <button class="btn btn-primary button-image">Pilih Foto</button>
          </div>
        </div>
        <div class="mb-3 col-md-9 account__container__content">
          <label for="nameInput" class="form-label">Nama Lengkap</label>
          <input type="text" class="form-control" id="nameInput" value="{{$user->person->person_name}}">
        </div>
        <div class="mb-3 col-md-9 account__container__content">
          <label for="placeBirthInput" class="form-label">Tempat Lahir</label>
          <input type="text" class="form-control" id="placeBirthInput" value="{{$user->person->person_birthplace}}">
        </div>
        <div class="mb-3 col-md-9 account__container__content">
          <label for="dateBirthInput" class="form-label">Tanggal Lahir</label>
          <input type="date" class="form-control" id="dateBirthInput" value="{{$user->person->person_birthdate}}">
        </div>
        <div class="mb-3 col-md-9 account__container__content">
          <label for="genderInput" class="form-label">Jenis Kelamin</label>
          <select class="form-select" aria-label="Pilih Jenis Kelamin" id="genderInput">
            <option>--- Jenis Kelamin ---</option>
            <option value="Laki-laki" @if($user->person->person_gender == 'Laki-laki') selected @endif>Laki-laki</option>
            <option value="Perempuan" @if($user->person->person_gender == 'Perempuan') selected @endif>Perempuan</option>
          </select>
        </div>
        <div class="mb-3 col-md-3 account__container__content">
          <button type="submit" class="btn btn-primary" id="submitFormAccount">Submit</button>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection