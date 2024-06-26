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
                <h1>Data Dosen</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/admin/dashboard">Master Data</a></div>
                    {{-- <div class="breadcrumb-item active"><a href="#">Data Dosen</a></div> --}}
                    <div class="breadcrumb-item">Data Dosen</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="data_dosen/create" class="btn btn-primary">Tambah Data</a>
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
                                                <th>Foto</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Sertifikat</th>
                                                <th>Data Sertifikat</th>
                                                <th>NIDN</th>
                                                <th>Perolehan NIDN</th>
                                                <th>Prodi</th>
                                                <th>Fungsional</th>
                                                <th>Tmt Fungsional</th>
                                                <th>Golongan</th>
                                                <th>Tmt Golongan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $dt)
                                                @php
                                                    \Carbon\Carbon::setLocale('id');
                                                @endphp
                                                <tr>
                                                    <td class="text-center">{{ $loop->index + 1 }}.</td>
                                                    <td>
                                                        <img alt="image"
                                                            src="{{ asset('assets_admin/img/avatar/avatar-5.png') }}"
                                                            class="rounded-circle" width="35" data-toggle="tooltip"
                                                            title="Wildan Ahdian">
                                                    </td>
                                                    <td>{{ $dt->name }}</td>
                                                    <td>{{ $dt->nip ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->no_sertifikat ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->data_sertifikat ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->nidn ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tgl_nidn ? \Carbon\Carbon::parse($dt->tgl_nidn)->translatedFormat('d F Y') : 'Belum terisi' }}
                                                    </td>
                                                    <td>{{ $dt->prodi ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->fungsional ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tgl_fungsional ? \Carbon\Carbon::parse($dt->tgl_fungsional)->translatedFormat('d F Y') : 'Belum terisi' }}
                                                    </td>
                                                    <td>{{ $dt->golongan ?: 'Belum terisi' }}</td>
                                                    <td>{{ $dt->tgl_golongan ? \Carbon\Carbon::parse($dt->tgl_golongan)->translatedFormat('d F Y') : 'Belum terisi' }}
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('data_dosen.edit', $dt->id) }}"
                                                                class="btn btn-icon btn-primary"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <form action="{{ route('data_dosen.destroy', $dt->id) }}"
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
