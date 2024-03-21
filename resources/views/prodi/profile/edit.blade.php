@extends('prodi.layouts.app')

@section('title', 'Advanced Forms')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets_admin/library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets_admin/library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('content-prodi')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Data Diri</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/prodi/profile">Data Diri</a></div>
                    <div class="breadcrumb-item">Edit Data Diri</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form action="{{ route('prodi.profile.update', $data->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label>NIP</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="nip" name="nip"
                                                placeholder="Masukkan NIP" value="{{ old('nip', $data->nip) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="foto" name="foto"
                                                value="{{ old('foto', $data->foto) }}" accept="image/*"
                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="img-output mt-3 d-flex justify-content-start">
                                            <img src="{{ url('images/' . old('foto', $data->foto)) }}"
                                                onerror="this.onerror=null;this.src='{{ asset('assets_admin/img/avatar/avatar-5.png') }}';"
                                                id="output" width="180">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Masukkan nama" value="{{ old('name', $data->name) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>No. Sertifikat Dosen</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="no_sertifikat"
                                                name="no_sertifikat" placeholder="Masukkan nomor sertifikat dosen"
                                                value="{{ old('no_sertifikat', $data->no_sertifikat) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Bukti Sertifikat Dosen</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="data_sertifikat"
                                                name="data_sertifikat" placeholder="Masukkan link bukti sertifikat dosen"
                                                value="{{ old('data_sertifikat', $data->data_sertifikat) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>NIDN (Nomor Induk Dosen Nasional)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="nidn" name="nidn"
                                                placeholder="Masukkan NIDN" value="{{ old('nidn', $data->nidn) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Perolehan NIDN</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="tgl_nidn"
                                                name="tgl_nidn" name="tgl_nidn" placeholder="Pilih tanggal"
                                                value="{{ old('tgl_nidn', $data->tgl_nidn) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pendidikan</label>
                                        <select class="form-control selectric" name="pendidikan" id="pendidikan">
                                            <option value="" @readonly(true)>Pilih Pendidikan</option>
                                            <option value="S1">Strata 1 (S1)</option>
                                            <option value="S2">Strata 2 (S2)</option>
                                            <option value="S3">Strata 1 (S3)</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Program Studi</label>
                                        <select class="form-control selectric" name="prodi" id="prodi">
                                            <option value="" @readonly(true)>Pilih Program Studi</option>
                                            <option value="Teknik informatika">Teknik informatika</option>
                                            <option value="Sistem Informasi">Sistem Informasi</option>
                                            <option value="Desain Komunikasi Visual">Desain Komunikasi Visual</option>
                                            <option value="Desain Komunikasi Visual">Manajemen Informatika</option>
                                            <option value="Desain Komunikasi Visual">Komputerisasi Akuntansi</option>
                                            <option value="Desain Komunikasi Visual">Akuntansi</option>
                                            <option value="Desain Komunikasi Visual">Manajemen</option>
                                            <option value="Desain Komunikasi Visual">Manajemen Bisnis</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jabatan Fungsional Terakhir</label>
                                        <select class="form-control selectric" name="fungsional" id="fungsional">
                                            <option value="">Pilih Jabatan Fungsional</option>
                                            <option value="Asisten Ahli">Asisten Ahli</option>
                                            <option value="Lektor">Lektor</option>
                                            <option value="Lektor Kepala">Lektor Kepala</option>
                                            <option value="Guru Besar">Guru Besar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>TMT Jabatan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="tgl_fungsional"
                                                name="tgl_fungsional" placeholder="Pilih tanggal"
                                                value="{{ old('tgl_fungsional', $data->tgl_fungsional) }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Golongan</label>
                                        <select class="form-control selectric" name="golongan" id="golongan">
                                            <option value="">Pilih Golongan</option>
                                            <option value="Asisten Ahli">Asisten Ahli</option>
                                            <option value="Lektor">Lektor</option>
                                            <option value="Lektor Kepala">Lektor Kepala</option>
                                            <option value="Guru Besar">Guru Besar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>TMT Golongan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <i class="fas fa-calendar"></i>
                                                </div>
                                            </div>
                                            <input type="text" class="form-control datepicker" id="tgl_golongan"
                                                name="tgl_golongan" placeholder="Pilih tanggal"
                                                value="{{ old('tgl_golongan', $data->tgl_golongan) }}">

                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/mahasiswa/profile" class="btn btn-primary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('assets_admin/library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('assets_admin/library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets_admin/library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets_admin/js/page/forms-advanced-forms.js') }}"></script>
@endpush
