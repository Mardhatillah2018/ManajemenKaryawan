@extends('dashboard.layouts.main')

@section('content')
<h1></h1>
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center" style="color: #3A4D6B;">Input Data Karyawan</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/karyawan" method="post">
                @csrf

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama</label>
                    <input type="text" class="form-control  @error('nama') is-invalid @enderror"
                    name="nama" id="nama" value="{{ old('nama') }}" placeholder="Nama">
                    @error('nama')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">NIK</label>
                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                           name="nik" id="nik" value="{{ old('nik') }}" placeholder="NIK">
                    @error('nik')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tempat Lahir</label>
                    <input type="text" class="form-control  @error('tempat_lahir') is-invalid @enderror"
                    name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}" placeholder="Tempat Lahir">
                    @error('tempat_lahir')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control  @error('tgl_lahir') is-invalid @enderror"
                    name="tgl_lahir" id="tgl_lahir" value="{{ old('tgl_lahir') }}" placeholder="Tanggal Lahir">
                    @error('tgl_lahir')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                    name="email" id="email" value="{{ old('email') }}" placeholder="Email">
                    @error('email')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">No HP</label>
                    <input type="text" class="form-control  @error('nohp') is-invalid @enderror"
                    name="nohp" id="nohp" value="{{ old('nohp') }}" placeholder="No HP">
                    @error('nohp')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal Masuk</label>
                    <input type="date" class="form-control  @error('tgl_masuk') is-invalid @enderror"
                    name="tgl_masuk" id="tgl_masuk" value="{{ old('tgl_masuk') }}" placeholder="Tanggal Masuk">
                    @error('tgl_masuk')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="departemen" class="form-label">Departemen</label>
                    <select class="form-select" name="departemen_id" id="departemen">
                        <option value="">Pilih Departemen</option>
                        @foreach($departemens as $departemen)
                            <option value="{{ $departemen->id }}">{{ $departemen->nama_departemen }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <select class="form-select" name="jabatan_id" id="jabatan">
                        <option value="">Pilih Jabatan</option>
                        @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                              name="alamat" id="alamat" placeholder="Masukkan Alamat">{{ old('alamat') }}</textarea>
                    @error('alamat')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>

                <button type="submit" class="btn btn-primary" style="background-color: #3A4D6B; border-color: #3A4D6B;">Submit</button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
