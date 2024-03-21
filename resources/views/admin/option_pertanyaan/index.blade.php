@extends('admin.layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets_admin/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('content-admin')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                @if ($question->status == 'atasan')
                    <h1>Jawaban Atasan</h1>
                @else
                    <h1>Jawaban Mahasiswa</h1>
                @endif
                {{-- <h1>Jawaban</h1> --}}

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/admin/pertanyaan_atasan">Pertanyaan</a></div>
                    {{-- <div class="breadcrumb-item active"><a href="#">Data Dosen</a></div> --}}
                    <div class="breadcrumb-item">Penilaian Atasan</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <h6 style="margin-left: 25px; margin-top: 20px;">Pertanyaan :
                                {{ $question->question_text ?: 'Belum terisi' }}</h6>

                            <div class="card-header">
                                @if ($question->tipe == 'jawaban' && $option_count == 1)
                                    {{-- <a href="{{ route('admin.jawaban_pertanyaan.create', $question->id) }}"
                                        class="btn btn-primary">Tambah Data</a> --}}
                                    @if ($question->status == 'atasan')
                                        <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @else
                                        <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @endif
                                    {{-- <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a> --}}
                                @elseif ($question->tipe == 'jawaban' && $option_count == 0)
                                    <a href="{{ route('admin.jawaban_pertanyaan.create', $question->id) }}"
                                        class="btn btn-primary">Tambah Data</a>
                                    @if ($question->status == 'atasan')
                                        <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @else
                                        <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @endif
                                    {{-- <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a> --}}
                                @elseif ($question->tipe == 'pilihan')
                                    <a href="{{ route('admin.jawaban_pertanyaan.create', $question->id) }}"
                                        class="btn btn-primary">Tambah Data</a>
                                    @if ($question->status == 'atasan')
                                        <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @else
                                        <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @endif
                                    {{-- <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a> --}}
                                @else
                                    @if ($question->status == 'atasan')
                                        <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @else
                                        <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                            style="margin-left: 10px">Kembali</a>
                                    @endif
                                    {{-- <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a> --}}
                                @endif
                                {{-- <a href="{{ route('admin.jawaban_pertanyaan.create', $question->id) }}"
                                    class="btn btn-primary">Tambah Data</a>
                                @if ($question->status == 'atasan')
                                    <a href="{{ route('admin.pertanyaan_atasan') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a>
                                @else
                                    <a href="{{ route('admin.pertanyaan_mahasiswa') }}" class="btn btn-primary"
                                        style="margin-left: 10px">Kembali</a>
                                @endif --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                {{-- <th>Pertanyaan</th> --}}
                                                <th>Jawaban</th>
                                                <th>Nilai</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($options as $dt)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}.</td>
                                                    {{-- <td>{{ $dt->question_id->question_text ?: 'Belum terisi' }}</td> --}}
                                                    <td>{{ $dt->option_text ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->point ?: 'Belum terisi' }}</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.jawaban_pertanyaan.edit', $dt->id) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('admin.jawaban_pertanyaan.destroy', $dt->id) }}"
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
