@extends('admin/layout/main')


@section('title','Buat Akun')

@section('content')
  <section class="account">
    <h2>Form Buat Akun</h2>
    <div class="card">
      <div class="card-body">
        <form action="" id="accountForm">
          <div class="form-group">
            <label class="control-label mb-3" for="image">Foto Diri</label>
            <div class="account__image">
              <img src="{{ asset('img/insert-image.png') }}" alt="Foto Diri" class="img-fluid">
              <button class="btn btn-primary button-image">Pilih Foto</button>
            </div>
          </div>
          <div class="mb-3 col-md-9 account__container__content">
            <label for="nameInput" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Tuliskan nama lengkap disini...">
          </div>
          <div class="mb-3 col-md-9 account__container__content">
            <label for="placeBirthInput" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="placeBirthInput" placeholder="Kota kelahiran...">
          </div>
          <div class="mb-3 col-md-9 account__container__content">
            <label for="dateBirthInput" class="form-label">Tanggal Lahir</label>
            <input type="datetime-local" class="form-control" id="dateBirthInput" placeholder="Tanggal kelahiran...">
          </div>
          <div class="mb-3 col-md-9 account__container__content">
            <label for="genderInput" class="form-label">Jenis Kelamin</label>
            <select class="form-select" aria-label="Pilih Jenis Kelamin" id="genderInput">
              <option selected>--- Jenis Kelamin ---</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
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