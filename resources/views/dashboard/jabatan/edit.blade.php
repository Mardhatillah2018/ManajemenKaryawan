@extends('dashboard.layouts.main')

@section('content')
<h1></h1>
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center" style="color: #3A4D6B;">Edit Data Jabatan</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/jabatan/{{  $jabatan->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Jabatan</label>
                    <input type="text" class="form-control  @error('nama_jabatan') is-invalid @enderror"
                    name="nama_jabatan" id="nama_jabatan" value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}" placeholder="Nama Jabatan">
                    @error('nama_jabatan')
                        <div class=invalid-feedback>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control  @error('gaji_pokok') is-invalid @enderror"
                    name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $jabatan->gaji_pokok) }}" placeholder="Gaji Pokok">
                    @error('gaji_pokok')
                        <div class=invalid-feedback>
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
