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
                <h1>Pertanyaan Atasan</h1>
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
                            <form action="/admin/pertanyaan_atasan" method="GET">
                                {{-- @csrf --}}
                                <div class="row">
                                    <div class="form-group" style="margin-left: 30px; margin-top: 20px;">
                                        <label>Semester</label>
                                        <select class="form-control selectric" name="semester" id="semester">
                                            <option value="" @readonly(true)>Pilih Semester</option>
                                            @foreach ($semester as $smstr)
                                                <option value="{{ $smstr->id }}">{{ $smstr->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <h6 style="margin-left: 20px; margin-top: 30px;">--</h6>
                                    <div class="form-group" style="margin-left: 30px; margin-top: 20px;">
                                        <label>Tahun Akademik</label>
                                        <select class="form-control selectric" name="tahun_akademik" id="tahun_akademik">
                                            <option value="" @readonly(true)>Pilih Tahun Akademik</option>
                                            @foreach ($tahun_akademik as $tahun)
                                                <option value="{{ $tahun->id }}">{{ $tahun->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button style="width: 120px; height: 30px; margin-top: 55px; margin-left: 15px"
                                        type="submit" class="btn btn-primary">Cari Data</button>
                                </div>
                            </form>
                            <div class="card-body">
                                <a href="pertanyaan_atasan/create" style="margin-bottom: 20px;"
                                    class="btn btn-primary">Tambah Data</a>

                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Pertanyaan</th>
                                                <th>Semester</th>
                                                <th>Tahun Akademik</th>
                                                <th>Tipe Jawaban</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dt)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}.</td>
                                                    <td><a
                                                            href="{{ route('admin.jawaban_pertanyaan', $dt->id) }}">{{ $dt->question_text ?: 'Belum terisi' }}</a>
                                                    </td>
                                                    <td>{{ $dt->semester->name ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tahun_akademik->name ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tipe ?: 'Belum terisi' }}</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.pertanyaan_atasan.edit', $dt->id) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('admin.pertanyaan_atasan.destroy', $dt->id) }}"
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
