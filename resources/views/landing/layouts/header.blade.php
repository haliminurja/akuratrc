<header class="tg-header__style-five header-fixed-height">
    <div id="sticky-header" class="tg-header__area tg-header__area-five">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tgmenu__wrap">
                        <nav class="tgmenu__nav">
                            <div class="logo">
                                <a href=""><img src="{{ asset('landing/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                <ul class="navigation">
                                    <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="{{ route('index') }}">BERANDA</a>
                                    </li>
                                    <li
                                        class="menu-item-has-children {{ Request::is('visi-misi') || Request::is('direktur-eksekutif') || Request::is('pencapaian') || Request::is('sejarah-akurat-center') || Request::is('lembaga-mitra') ? 'active' : '' }}">
                                        <a href="#">TENTANG AKURAT</a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('visi-misi') ? 'active' : '' }}"><a href="{{ route('visi-misi') }}"> Visi dan Misi</a></li>
                                            <li class="{{ Request::is('direktur-eksekutif') ? 'active' : '' }}"><a href="{{ route('direktur-eksekutif') }}">Direktur Eksekutif</a></li>
                                            <li class="{{ Request::is('sejarah-akurat-center') ? 'active' : '' }}"><a href="{{ route('sejarah') }}">Sejarah Akurat Center</a></li>
                                            <li class="{{ Request::is('lembaga-mitra') ? 'active' : '' }}"><a href="{{ route('mitra') }}">Lembaga Mitra</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children {{ Request::is('layanan*') ? 'active' : '' }}">
                                        <a href="#">LAYANAN</a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('layanan/1') ? 'active' : '' }}"><a href="{{ route('layanan',['layanan' => '1']) }}">RISET</a></li>
                                            <li class="{{ Request::is('layanan/2') ? 'active' : '' }}"><a href="{{ route('layanan',['layanan' => '1']) }}">STRATEGI</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('tim-akurat') ? 'active' : '' }}"><a href="{{ route('tim-akurat') }}">TIM AKURAT</a></li>

                                    <li class="{{ Request::is('publikasi') ? 'active' : '' }}"><a href="{{ route('berita') }}">PUBLIKASI</a></li>
                                    <li class="menu-item-has-children {{ Request::is('foto') || Request::is('video') ? 'active' : '' }}">
                                        <a href="#">GALERI</a>
                                        <ul class="sub-menu">
                                            <li class="{{ Request::is('foto') ? 'active' : '' }}">
                                                <a href="{{ route('galeri_foto') }}">FOTO</a>
                                            </li>
                                            <li class="{{ Request::is('video') ? 'active' : '' }}">
                                                <a href="{{ route('galeri_video') }}">VIDEO</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('kontak') ? 'active' : '' }}"><a href="{{route('kontak')}}">KONTAK</a></li>
                                </ul>
                                </ul>
                            </div>
                            <div class="mobile-nav-toggler mobile-nav-toggler-two">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                    <path
                                        d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z"
                                        fill="currentcolor" />
                                    <path
                                        d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z"
                                        fill="currentcolor" />
                                </svg>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="tgmobile__menu">
                        <nav class="tgmobile__menu-box">
                            <div class="close-btn"><i class="fas fa-times"></i></div>
                            <div class="nav-logo">
                                <a href="index.html"><img src="{{ asset('landing/img/logo/logo.png') }}" alt="Logo"></a>
                            </div>
                            <div class="tgmobile__search">
                                <form action="#">
                                    <input type="text" placeholder="Search here...">
                                    <button><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                            <div class="tgmobile__menu-outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="tgmobile__menu-bottom">
                                <div class="contact-info">
                                    <ul class="list-wrap">
                                        <li><a href="mailto:info@apexa.com">admin@akuratcenter.com</a></li>
                                        <li><a href="tel:0123456789">085235678866</a></li>
                                    </ul>
                                </div>
                                <div class="social-links">
                                    <ul class="list-wrap">
                                        <li><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-instagram"></i></a></li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                                        </li>
                                        <li><a href="javascript:void(0)"><i class="fab fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <div class="tgmobile__menu-backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
