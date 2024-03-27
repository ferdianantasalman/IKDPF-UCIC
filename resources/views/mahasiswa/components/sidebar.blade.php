<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/mahasiswa/dashboard">SIKAD UCIC</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="/mahasiswa/dashboard"><i class="far fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Menu</li>
            <li class="{{ Request::is('blank-page') ? 'active' : '' }}">
                <a class="nav-link" href="/mahasiswa/profile"><i class="far fa-square"></i> <span>Data
                        Diri</span></a>
            </li>
            <li class="nav-item dropdown {{ $type_menu === 'kinerja' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-user"></i> <span>Kuisioner</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('auth-forgot-password') ? 'active' : '' }}">
                        <a href="/mahasiswa/hasil_penilaian">Kuisioner Dosen</a>
                    </li>
                </ul>
            </li>
            {{-- <li class="nav-item dropdown {{ $type_menu === 'features' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-bicycle"></i>
                    <span>Kinerja</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('features-activities') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('features-activities') }}">Kinerja Pendidikan</a>
                    </li>
                    <li class="{{ Request::is('features-post-create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('features-post-create') }}">Kinerja Penelitian</a>
                    </li>
                    <li class="{{ Request::is('features-post') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('features-post') }}">Kinerja Pengabdian</a>
                    </li>
                    <li class="{{ Request::is('features-profile') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('features-profile') }}">Kinerja Penunjang</a>
                    </li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
