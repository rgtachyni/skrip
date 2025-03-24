<!-- BEGIN: LAYOUT/HEADERS/HEADER-1 -->
<!-- BEGIN: HEADER -->
<header class="c-layout-header c-layout-header-4 c-layout-header-default-mobile" data-minimize-offset="80">
    <div class="c-navbar">
        <div class="container">
            <!-- BEGIN: BRAND -->
            <div class="c-navbar-wrapper clearfix">
                <div class="c-brand c-pull-left">
                    <a href="index.html" class="c-logo">
                        <img src="{{ asset('logo.png') }}" width="300px" alt="JANGO" class="c-desktop-logo">
                        <img src="{{ asset('logo.png') }}" width="300px" alt="JANGO" class="c-desktop-logo-inverse">
                        <img src="{{ asset('logo.png') }}" alt="JANGO" class="c-mobile-logo">
                    </a>
                    <button class="c-hor-nav-toggler" type="button" data-target=".c-mega-menu">
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                        <span class="c-line"></span>
                    </button>
                    <button class="c-topbar-toggler" type="button">
                        <i class="fa fa-ellipsis-v"></i>
                    </button>
                    <button class="c-search-toggler" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                    <button class="c-cart-toggler" type="button">
                        <i class="icon-handbag"></i> <span class="c-cart-number c-theme-bg">2</span>
                    </button>
                </div>
                <!-- END: BRAND -->
                <!-- BEGIN: QUICK SEARCH -->
                <form class="c-quick-search" action="#">
                    <input type="text" name="query" placeholder="Type to search..." value=""
                        class="form-control" autocomplete="off">
                    <span class="c-theme-link">&times;</span>
                </form>
                <!-- END: QUICK SEARCH -->
                <!-- BEGIN: HOR NAV -->
                <!-- BEGIN: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- BEGIN: MEGA MENU -->
                <!-- Dropdown menu toggle on mobile: c-toggler class can be applied to the link arrow or link itself depending on toggle mode -->
                <nav
                    class="c-mega-menu c-pull-right c-mega-menu-dark c-mega-menu-dark-mobile c-fonts-uppercase c-fonts-bold">
                    <ul class="nav navbar-nav c-theme-nav">
                        <li>
                            <a href="{{ route('home') }}" class="c-link dropdown-toggle">Beranda<span
                                    class="c-arrow c-toggler"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('sejarah') }}" class="c-link dropdown-toggle">Sejarah<span
                                    class="c-arrow c-toggler"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('wisata') }}" class="c-link dropdown-toggle">Wisata<span
                                    class="c-arrow c-toggler"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('kegiatan') }}" class="c-link dropdown-toggle"
                                data-toggle="dropdown">Kategori<span class="c-arrow c-toggler"></span></a>
                            <div class="dropdown-menu c-menu-type-mega c-menu-type-classic" style="min-width: auto">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="dropdown-menu c-menu-type-inline">
                                            @foreach (Helper::getData('kategori') as $v)
                                                <li>
                                                    <a href="{{ route('kategori', $v->id) }}">
                                                        {{ $v->nama }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('kegiatan') }}" class="c-link dropdown-toggle">Event<span
                                    class="c-arrow c-toggler"></span></a>
                        </li>
                        <li>
                            <a href="{{ route('galeri') }}" class="c-link dropdown-toggle">Galeri<span
                                    class="c-arrow c-toggler"></span></a>
                        </li>
                    </ul>
                </nav>
                <!-- END: MEGA MENU --><!-- END: LAYOUT/HEADERS/MEGA-MENU -->
                <!-- END: HOR NAV -->
            </div>
        </div>
    </div>
</header>
<!-- END: HEADER --><!-- END: LAYOUT/HEADERS/HEADER-1 -->
