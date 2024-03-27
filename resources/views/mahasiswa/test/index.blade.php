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

                            {{-- <h6 style="margin-left: 30px; margin-top: 20px;">Pertanyaan : </h6> --}}

                            <div class="card-header">
                                <a href="penilaian/create" class="btn btn-primary">Mulai Kuisioner</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nilai</th>
                                                <th>Pertanyaan</th>
                                                <th>Jawaban</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $result)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}.</td>
                                                    <td>{{ $result->total_points }}</td>
                                                    <td>
                                                        @foreach ($result->questions as $question)
                                                            <span>{{ $question->question_text }}, </span>
                                                        @endforeach
                                                    </td>
                                                    <td>jawaban</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.pertanyaan_mahasiswa.edit', $dt->id) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="fas fa-eye"></i></a>
                                                            <form
                                                                action="{{ route('admin.pertanyaan_mahasiswa.destroy', $dt->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')"
                                                                    class="btn btn-icon btn-primary ms-3">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
