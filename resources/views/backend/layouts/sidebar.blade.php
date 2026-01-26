 <div class="sidebar-area" id="sidebar-area">
        <div class="logo position-relative">
            <a href="index.html" class="d-block text-decoration-none">
                <img src="{{ asset('backend/assets/images/logo-poltekbang.jpg') }}" width="80" alt="logo-icon">
                {{-- <span class="logo-text fw-bold text-dark">Farol</span> --}}
            </a>
            <button
                class="sidebar-burger-menu bg-transparent p-0 border-0 opacity-0 z-n1 position-absolute top-50 end-0 translate-middle-y"
                id="sidebar-burger-menu">
                <i data-feather="x"></i>
            </button>
        </div>
        <aside id="layout-menu" class="layout-menu menu-vertical menu active" data-simplebar>
            <ul class="menu-inner">
                <li class="menu-item">
                    <a href="{{ route('dasbor') }}" class="menu-link">
                        <i data-feather="home" class="menu-icon tf-icons"></i>
                        <span class="title">Dasbor</span>
                    </a>
                </li>
                <li class="menu-title small text-uppercase">
                    <span class="menu-title-text">DATA</span>
                </li>
                @if (auth()->user()->level == 'admin')
                    
                    <li class="menu-item">
                        <a href="{{ route('dosen.index') }}" class="menu-link">
                            <i data-feather="users" class="menu-icon tf-icons"></i>
                            <span class="title">Data Dosen</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('matakuliah.index') }}" class="menu-link">
                            <i data-feather="file-text" class="menu-icon tf-icons"></i>
                            <span class="title">Data Matakuliah</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('jadwal.index') }}" class="menu-link">
                            <i data-feather="calendar" class="menu-icon tf-icons"></i>
                            <span class="title">Data Jadwal Kuliah</span>
                        </a>
                    </li>
                @endif

                @if (auth()->user()->level == 'Dosen')
                    
                    <li class="menu-item">
                        <a href="{{ route('mahasiswa.index') }}" class="menu-link">
                            <i data-feather="user-check" class="menu-icon tf-icons"></i>
                            <span class="title">Data Mahasiswa</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="{{ route('absensi.index') }}" class="menu-link">
                            <i data-feather="table" class="menu-icon tf-icons"></i>
                            <span class="title">Data Absensi</span>
                        </a>
                    </li>
                    
                @endif
              
                
            </ul>
        </aside>
       
    </div>