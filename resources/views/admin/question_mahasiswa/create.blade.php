@extends('admin.layouts.app')

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

@section('content-admin')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Pertanyaan Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pertanyaan</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Kinerja Penunjang</a></div>
                    <div class="breadcrumb-item">Tambah Data</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form action="/admin/pertanyaan_mahasiswa" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Pertanyaan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="question_text"
                                                name="question_text" placeholder="Masukkan pertanyaan.....">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Pelaksanaan</label>
                                        <select class="form-control selectric" name="pelaksanaan" id="pelaksanaan">
                                            <option value="Semester Gasal">Semester Gasal</option>
                                            <option value="Semester Genap">Semester Genap</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Akademik</label>
                                        <select class="form-control selectric" name="tahun_akademik" id="tahun_akademik">
                                            <option value="2021/2022">2021/2022</option>
                                            <option value="2022/2023">2022/2023</option>
                                            <option value="2023/2024">2023/2024</option>
                                            <option value="2024/2025">2024/2025</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Tipe Jawaban</label>
                                        <select class="form-control selectric" name="tipe" id="tipe">
                                            <option value="jawaban">Jawaban</option>
                                            <option value="pilihan">Pilihan</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/admin/pertanyaan_mahasiswa" class="btn btn-primary">Kembali</a>
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
