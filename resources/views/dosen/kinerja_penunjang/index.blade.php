@extends('dosen.layouts.app')

@section('title', 'DataTables')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets_admin/library/datatables/media/css/jquery.dataTables.min.css') }}">
@endpush

@section('content-dosen')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kinerja Penunjang</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="#">Data Kinerja</a></div>
                    {{-- <div class="breadcrumb-item active"><a href="#">Data Dosen</a></div> --}}
                    <div class="breadcrumb-item">Kinerja Penunjang</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="kinerja_penunjang/create" class="btn btn-primary">Tambah Data</a>
                            </div>
                            {{-- <div class="card-header">
                                <h4>Data Dosen</h4>
                            </div> --}}
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-striped table" id="table-1">
                                        <thead>
                                            <tr>
                                                <th class="text-center">
                                                    No
                                                </th>
                                                <th>Nama</th>
                                                <th>Kegiatan</th>
                                                <th>Data Dukung</th>
                                                <th>SKS</th>
                                                <th>Pelaksanaan</th>
                                                <th>Tahun Akademik</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dt)
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}.</td>
                                                    <td>{{ $dt->user->name ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->jenis_kegiatan ?: 'Belum terisi' }}</td>
                                                    <td><a href="{{ $dt->data_pendukung ?: 'Belum terisi' }}"
                                                            target="_blank"
                                                            rel="noopener noreferrer">{{ $dt->data_pendukung ?: 'Belum terisi' }}</a>
                                                    </td>
                                                    <td>{{ $dt->sks ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->pelaksanaan ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tahun_akademik ?: 'Belum terisi' }}</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('kinerja_penunjang.edit', $dt->id) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form
                                                                action="{{ route('kinerja_penunjang.destroy', $dt->id) }}"
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
