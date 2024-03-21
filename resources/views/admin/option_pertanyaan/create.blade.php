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
                <h1>Tambah Jawaban</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pertanyaan</a></div>
                    <div class="breadcrumb-item"><a href="#">Jawaban</a></div>
                    <div class="breadcrumb-item">Tambah Jawaban</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <h6 style="margin-left: 25px; margin-top: 20px;">Pertanyaan :
                                {{ $question->question_text ?: 'Belum terisi' }}</h6>
                            <div class="card-body">
                                <form action="/admin/jawaban_pertanyaan" method="POST">
                                    @csrf
                                    <input type="hidden" class="form-control" id="question_id" name="question_id"
                                        placeholder="Masukkan jawaban....." value="{{ $question->id }}">
                                    @if ($question->tipe == 'pilihan')
                                        <div class="form-group">
                                            <label>Jawaban</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="option_text"
                                                    name="option_text" placeholder="Masukkan jawaban.....">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Nilai</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="point" name="point"
                                                    placeholder="Masukkan nilai.....">
                                            </div>
                                        </div>
                                    @else
                                        <div class="form-group">
                                            <label>Nilai</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" id="point" name="point"
                                                    placeholder="Masukkan nilai.....">
                                            </div>
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('admin.jawaban_pertanyaan', $question->id) }}"
                                        class="btn btn-primary">Kembali</a>
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
