 <header class="header-area">
    <div class="header-main-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="header-main">
                        <!-- header logo start -->
                        <div class="header-element logo">
                            <a href="index.html" class="theme-header-logo">
                                <img src="{{ asset('backend/assets/images/logo-poltekbang.jpg') }}" width="80" class="img-fluid" alt="logo">
                            </a>
                        </div>
                        <!-- header logo end -->
                        <!-- header megamenu start -->
                        <div class="header-element megamenu-content">
                            <div class="mainwrap collapse show" id="main-collapse">
                                <ul class="main-menu">
                                    <li class="menu-link">
                                        <a href="/" class="link-title">
                                            <span class="sp-link-title">Beranda</span>
                                        </a>
                                    </li>
                                    <li class="menu-link">
                                        <a href="/" class="link-title">
                                            <span class="sp-link-title">Simulasi Heliport</span>
                                            <span class="menu-arrow"><i class="feather-chevron-down"></i></span>
                                        </a>
                                        <a href="#desk-home" data-bs-toggle="collapse" class="link-title link-title-lg">
                                            <span class="sp-link-title">Home</span>
                                            <span class="menu-arrow"><i class="feather-chevron-down"></i></span>
                                        </a>
                                        <div class="menu-dropdown single-menu collapse" id="desk-home">
                                            <ul class="container ul p-0">
                                                <li class="singlemenu-li">
                                                    <a href="{{ route('simulasi-heliport') }}" class="singlelink-title">
                                                        <span class="sp-link-title">Simulasi Heliport</span>
                                                    </a>
                                                </li>
                                                {{-- <li class="singlemenu-li">
                                                    <a href="{{ route('simulasi-heliport-3d') }}" class="singlelink-title">
                                                        <span class="sp-link-title">Simulasi Heliport 3D</span>
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="menu-link">
                                        <a href="/" class="link-title">
                                            <span class="sp-link-title">Jadwal Perkuliahan</span>
                                            <span class="menu-arrow"><i class="feather-chevron-down"></i></span>
                                        </a>
                                        <a href="#desk-home" data-bs-toggle="collapse" class="link-title link-title-lg">
                                            <span class="sp-link-title">Home</span>
                                            <span class="menu-arrow"><i class="feather-chevron-down"></i></span>
                                        </a>
                                        <div class="menu-dropdown single-menu collapse" id="desk-home">
                                            <ul class="container ul p-0">
                                                <li class="singlemenu-li">
                                                    <a href="{{ route('jadwal-tlb') }}" class="singlelink-title">
                                                        <span class="sp-link-title">Teknik Listrik Bandara</span>
                                                    </a>
                                                </li>
                                                <li class="singlemenu-li">
                                                    <a href="{{ route('jadwal-mbu') }}" class="singlelink-title">
                                                        <span class="sp-link-title">Manajemen Bandar Udara</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- header megamenu end -->
                        <!-- right-block-box start-->
                        <div class="header-element right-block-box">
                            <ul class="shop-element">
                                <li class="side-wrap toggle-wrap">
                                    <!-- button toggler start -->
                                    <button class="toggler-button"><i class="feather-menu"></i></button>
                                    <!-- button toggler end -->
                                </li>
                                <li class="side-wrap track-wrap">
                                    <div class="track-block">
                                        <a href="/login">
                                            <span class="icon"><i class="feather-user"></i></span>
                                            <span class="title-block">
                                                <span class="hot-title">LOGIN</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- right-block-box end-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>