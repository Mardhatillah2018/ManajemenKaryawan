@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-center align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h3 text-center" style="color: #3A4D6B;">Edit Data Gaji</h2>
</div>
<div class="row">
  <div class="col-lg-8 col-md-10 mx-auto">
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="/gaji/{{ $gaji->id }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <select class="form-select" name="karyawan_id" id="nama" onchange="fillKaryawanData()">
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}"
                                @if ($karyawan->id == old('karyawan_id', $gaji->karyawan_id))
                                    selected
                                @endif
                                data-nik="{{ $karyawan->nik }}"
                                data-jabatan="{{ $karyawan->jabatan->nama_jabatan }}"
                                data-departemen="{{ $karyawan->departemen->nama_departemen }}"
                                data-gaji="{{ $karyawan->jabatan->gaji_pokok }}">
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="nik" class="form-label">NIK</label>
                    <input type="text" class="form-control" id="nik" readonly value="{{ old('nik', $gaji->karyawan->nik) }}">
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" id="jabatan" readonly value="{{ old('jabatan', $gaji->karyawan->jabatan->nama_jabatan) }}">
                </div>

                <div class="mb-3">
                    <label for="departemen" class="form-label">Departemen</label>
                    <input type="text" class="form-control" id="departemen" readonly value="{{ old('departemen', $gaji->karyawan->departemen->nama_departemen) }}">
                </div>

                <div class="mb-3">
                    <label for="bulan_tahun" class="form-label">Tanggal Gajian</label>
                    <input type="date" class="form-control @error('bulan_tahun') is-invalid @enderror" name="bulan_tahun" id="bulan_tahun" value="{{ old('bulan_tahun', $gaji->bulan_tahun) }}">
                    @error('bulan_tahun')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control" id="gaji_pokok" readonly value="{{ old('gaji_pokok', $gaji->jabatan->gaji_pokok) }}">
                </div>

                <div class="mb-3">
                    <label for="bonus" class="form-label">Bonus</label>
                    <input type="number" class="form-control @error('bonus') is-invalid @enderror" name="bonus" id="bonus" value="{{ old('bonus', $gaji->bonus) }}" placeholder="Bonus" oninput="calculateTotalGaji()">
                    @error('bonus')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="potongan" class="form-label">Potongan</label>
                    <input type="number" class="form-control @error('potongan') is-invalid @enderror" name="potongan" id="potongan" value="{{ old('potongan', $gaji->potongan) }}" placeholder="Potongan" oninput="calculateTotalGaji()">
                    @error('potongan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="total_gaji" class="form-label">Total Gaji</label>
                    <input type="number" class="form-control @error('total_gaji') is-invalid @enderror" name="total_gaji" id="total_gaji" readonly value="{{ old('total_gaji', $gaji->total_gaji) }}">
                    @error('total_gaji')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                        <option value="Belum Diterima" @if (old('status', $gaji->status) == 'Belum Diterima') selected @endif>Belum Diterima</option>
                        <option value="Diterima" @if (old('status', $gaji->status) == 'Diterima') selected @endif>Diterima</option>
                    </select>
                    @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary" style="background-color: #3A4D6B; border-color: #3A4D6B;">Submit</button>
            </form>
        </div>
    </div>
  </div>
</div>

<script>
    // isi data karyawan otomatis
    function fillKaryawanData() {
        var selectedOption = document.getElementById('nama').selectedOptions[0];
        document.getElementById('nik').value = selectedOption.getAttribute('data-nik');
        document.getElementById('jabatan').value = selectedOption.getAttribute('data-jabatan');
        document.getElementById('departemen').value = selectedOption.getAttribute('data-departemen');
        document.getElementById('gaji_pokok').value = selectedOption.getAttribute('data-gaji');
        calculateTotalGaji(); // update total gaji
    }

    // hitung total gaji
    function calculateTotalGaji() {
        var gajiPokok = parseFloat(document.getElementById('gaji_pokok').value) || 0;
        var bonus = parseFloat(document.getElementById('bonus').value) || 0;
        var potongan = parseFloat(document.getElementById('potongan').value) || 0;
        var totalGaji = gajiPokok + bonus - potongan;
        document.getElementById('total_gaji').value = totalGaji;
    }
</script>
@endsection
