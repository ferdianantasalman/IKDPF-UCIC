@extends('mahasiswa.layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets_admin/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('content-mahasiswa')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Kuisioner Mahasiswa</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/admin/hasil_penilaian">Data Kuisioner</a></div>
                    {{-- <div class="breadcrumb-item active"><a href="#">Data Dosen</a></div> --}}
                    <div class="breadcrumb-item">Penilaian Mahasiswa</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <form method="POST" action="{{ route('mahasiswa.penilaian.store') }}">
                                    @csrf
                                    <div class="card-body">
                                        @foreach ($questions as $question)
                                            <div class="card @if (!$loop->last) mb-3 @endif">
                                                <div class="card-header">{{ $question->question_text }}</div>

                                                <div class="card-body">
                                                    <input type="hidden" name="questions[{{ $question->id }}]"
                                                        value="">
                                                    @foreach ($question->questionOptions as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="questions[{{ $question->id }}]"
                                                                id="option-{{ $option->id }}"
                                                                value="{{ $option->id }}"@if (old("questions.$question->id") == $option->id) checked @endif>
                                                            <label class="form-check-label"
                                                                for="option-{{ $option->id }}">
                                                                {{ $option->option_text }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    @if ($errors->has("questions.$question->id"))
                                                        <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;"
                                                            role="alert">
                                                            <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                Submit
                                            </button>
                                        </div>
                                    </div>
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
    {{-- <script src="assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script> --}}
    <script src="{{ asset('assets_admin/library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ asset() }}"></script> --}}
    {{-- <script src="{{ asset() }}"></script> --}}
    <script src="{{ asset('assets_admin/library/jquery-ui-dist/jquery-ui.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets_admin/js/page/modules-datatables.js') }}"></script>
@endpush
