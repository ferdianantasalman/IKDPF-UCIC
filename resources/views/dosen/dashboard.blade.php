@extends('dosen.layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets_admin/library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets_admin/library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('content-dosen')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kinerja Pendidikan</h4>
                            </div>
                            <div class="card-body">
                                {{ $kinerja_pendidikan_count }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kinerja Penelitian</h4>
                            </div>
                            <div class="card-body">
                                {{ $kinerja_penelitian_count }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-file"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kinerja Pengabdian</h4>
                            </div>
                            <div class="card-body">
                                {{ $kinerja_pengabdian_count }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Kinerja Penunjang</h4>
                            </div>
                            <div class="card-body">
                                {{ $kinerja_penunjang_count }}
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
    <script src="{{ asset('assets_admin/library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('assets_admin/library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets_admin/library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('assets_admin/js/page/index-0.js') }}"></script>
@endpush
