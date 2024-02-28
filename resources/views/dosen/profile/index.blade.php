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
                <h1>Data Diri</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="/dosen/profile">Data Diri</a></div>
                    {{-- <div class="breadcrumb-item active"><a href="#">Data Dosen</a></div> --}}
                    {{-- <div class="breadcrumb-item">Data Diri</div> --}}
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class=" table-md table">
                                        @php
                                            \Carbon\Carbon::setLocale('id');
                                        @endphp
                                        <tr>
                                            <th>
                                                <img alt="image" src="{{ url('images/' . $user['foto']) }}"
                                                    onerror="this.onerror=null;this.src='{{ asset('assets_admin/img/avatar/avatar-5.png') }}';"
                                                    width="150">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NIP</th>
                                            <th>{{ $user['nip'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Nama</th>
                                            <th>{{ $user['name'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Sertifikat</th>
                                            <th>{{ $user['no_sertifikat'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Data Sertifikat</th>
                                            <th><a href="{{ $user['data_sertifikat'] ?: 'Belum terisi' }}" target="_blank"
                                                    rel="noopener noreferrer">{{ $user['data_sertifikat'] ?: 'Belum terisi' }}</a>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>NIDN (Nomor Induk Dosen Nasional)</th>
                                            <th>{{ $user['nidn'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Perolehan NIDN</th>
                                            <th>{{ \Carbon\Carbon::parse($user['tgl_nidn'])->translatedFormat('d F Y') ?: 'Belum terisi' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan</th>
                                            <th>{{ $user['pendidikan'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Prodi</th>
                                            <th>{{ $user['prodi'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Fungsional</th>
                                            <th>{{ $user['fungsional'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tmt Fungsional</th>
                                            <th>{{ \Carbon\Carbon::parse($user['tgl_fungsional'])->translatedFormat('d F Y') ?: 'Belum terisi' }}
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Golongan</th>
                                            <th>{{ $user['golongan'] ?: 'Belum terisi' }}</th>
                                        </tr>
                                        <tr>
                                            <th>Tmt Golongan</th>
                                            <th>{{ \Carbon\Carbon::parse($user['tgl_golongan'])->translatedFormat('d F Y') ?: 'Belum terisi' }}
                                            </th>
                                        </tr>
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
