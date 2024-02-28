@extends('dosen.layouts.app')

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

@section('content-dosen')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Data Kinerja Penelitian</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Master Data</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Kinerja Penelitian</a></div>
                    <div class="breadcrumb-item">Tambah Data</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form action="/dosen/kinerja_penelitian" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Jenis Kegiatan</label>
                                        <div class="input-group">
                                            <textarea name="jenis_kegiatan" id="jenis_kegiatan" class="form-control" data-height="150" required=""
                                                placeholder="Masukkan jenis kegiatan...."></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>URL File Data Dukung (Google Drive) Bukti Penugasan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="data_pendukung"
                                                name="data_pendukung" placeholder="Masukkan data dukung.....">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>SKS Kinerja</label>
                                        <select class="form-control selectric" name="sks" id="sks">
                                            <option value="1">1 SKS</option>
                                            <option value="2">2 SKS</option>
                                            <option value="3">3 SKS</option>
                                            <option value="4">4 SKS</option>
                                        </select>
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
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="/dosen/kinerja_penelitian" class="btn btn-primary">Kembali</a>
                                </form>




                                {{-- <div class="form-group">
                                    <label>Date Picker</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control datepicker">

                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Currency</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                $
                                            </div>
                                        </div>
                                        <input type="text" class="form-control currency">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Purchase Code</label>
                                    <input type="text" class="form-control purchase-code"
                                        placeholder="ASDF-GHIJ-KLMN-OPQR">
                                </div>
                                <div class="form-group">
                                    <label>Invoice</label>
                                    <input type="text" class="form-control invoice-input">
                                </div>
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="text" class="form-control datemask" placeholder="YYYY/MM/DD">
                                </div>
                                <div class="form-group">
                                    <label>Credit Card</label>
                                    <input type="text" class="form-control creditcard">
                                </div>
                                <div class="form-group">
                                    <label>Tags</label>
                                    <input type="text" class="form-control inputtags">
                                </div> --}}
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
