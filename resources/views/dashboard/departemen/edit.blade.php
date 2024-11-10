@extends('dashboard.layouts.main')

@section('content')
<h1></h1>
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center" style="color: #3A4D6B;">Edit Data Departemen</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/departemen/{{  $departemen->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Departemen</label>
                    <input type="text" class="form-control  @error('nama_departemen') is-invalid @enderror"
                    name="nama_departemen" id="nama_departemen" value="{{ old('nama_departemen', $departemen->nama_departemen) }}" placeholder="Nama Departemen">
                    @error('nama_departemen')
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
