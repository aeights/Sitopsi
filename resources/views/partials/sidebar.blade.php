<!--**********************************
    Sidebar start
***********************************-->
<div class="quixnav">
    <div class="quixnav-scroll">
        @if (Auth::user()->role['name'] == 'admin') 
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="has-arrows" href="/">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('admin.mahasiswa.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Mahasiswa</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('admin.alternatif.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Alternatif</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('admin.kriteria.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Kriteria</span>
                </a>
            </li>  
            <li>
                <a class="has-arrows" href="{{ route('admin.profile.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li> 
        </ul>
        @else
        <ul class="metismenu" id="menu">
            <li class="nav-label first">Main Menu</li>
            <li>
                <a class="has-arrows" href="/">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('mahasiswa.alternatif.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Alternatif</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('mahasiswa.kriteria.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Kriteria</span>
                </a>
            </li>  
            <li>
                <a class="has-arrows" href="{{ route('mahasiswa.penilaian.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Penilaian</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('mahasiswa.penilaian.history') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Riwayat Penilaian</span>
                </a>
            </li>
            <li>
                <a class="has-arrows" href="{{ route('mahasiswa.profile.index') }}">
                    <i class="icon icon-app-store"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li> 
        </ul>
        @endif
    </div>
</div>
<!--**********************************
    Sidebar end
***********************************-->