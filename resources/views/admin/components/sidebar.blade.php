<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/admin/dashboard">SIKAD UCIC</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="/admin/dashboard"><i class="far fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Master Data</li>
            <li class="nav-item dropdown {{ $type_menu === 'master' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('auth-forgot-password') ? 'active' : '' }}">
                        <a href="/admin/data_fakultas">Data Fakultas</a>
                    </li>
                    <li class="{{ Request::is('auth-login') ? 'active' : '' }}">
                        <a href="/admin/data_prodi">Data Program Studi</a>
                    </li>
                    <li class="{{ Request::is('auth-login2') ? 'active' : '' }}">
                        <a class="beep beep-sidebar" href="/admin/data_dosen">Data Dosen</a>
                    </li>
                    <li class="{{ Request::is('auth-login2') ? 'active' : '' }}">
                        <a class="beep beep-sidebar" href="/admin/semester">Data Semester</a>
                    </li>
                    <li class="{{ Request::is('auth-login2') ? 'active' : '' }}">
                        <a class="beep beep-sidebar" href="/admin/tahun_akademik">Data Tahun Akademik</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'kinerja' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Data Kinerja</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_pendidikan">Kinerja Pendidikan</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_penelitian">Kinerja Penelitian</a>
                    </li>
                    <li class="{{ Request::is('features-post') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_pengabdian">Kinerja Pengabdian</a>
                    </li>
                    <li class="{{ Request::is('features-profile') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_penunjang">Kinerja Penunjang</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'kinerja' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Quisioner</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/pertanyaan_atasan">Pertanyaan Atasan</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/pertanyaan_mahasiswa">Pertanyaan Mahasiswa</a>
                    </li>
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/hasil_atasan">Jawaban Penilaian Atasan</a>
                    </li>
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/hasil_mahasiswa">Jawaban Penilaian Mahasiswa</a>
                    </li>
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/hasil_mahasiswa">Hasil Penilaian Mahasiswa</a>
                    </li>
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/hasil_mahasiswa">Hasil Penilaian Mahasiswa</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item dropdown {{ $type_menu === 'kinerja' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Jawaban</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/jawaban">Keseluruhan</a>
                    </li>
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/jawaban_atasan">Penilaian Atasan</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/jawaban_mahasiswa">Penilaian Mahasiswa</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'kinerja' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Hasil</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_pendidikan">Penilaian Atasan</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link" href="/admin/kinerja_penelitian">Penilaian Mahasiswa</a>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </aside>
</div>
