<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-2">
                        <div class="logo">
                            <a href=""><img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1717962322/Verdies/srx3xflk0atk71jzrmdq.png" width="60"></a>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <!-- Main-menu -->
                        <div class="main-menu f-right d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}">
                                        <a href="{{ route('home') }}">Inicio</a>
                                    </li>
                                    <li class="{{ request()->routeIs('acerca') ? 'active' : '' }}">
                                        <a href="{{ route('acerca') }}">Nosotros</a>
                                    </li>
                                    <li><a href="{{route('home')}}">Promociones</a></li>
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    <li><a href="#">Paginas</a>
                                        <ul class="submenu">
                                            <li><a href="{{route('recepcion-material')}}">Aliados</a></li>
                                            <li><a href="">Blog</a></li>
                                            <li><a href="">Element</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ request()->routeIs('acerca') ? 'active' : '' }}">
                                        <a href="{{ route('acerca') }}">Contacto</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>
