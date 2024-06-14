<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo" style="background-color: #2D6244;">
                <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1718135136/Verdies/qstueojoanvz5onacloo.png" alt="" class="img-fluid" height="100"></a>

                <!-- <a href="">-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{route('home')}}">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="{{route('acerca')}}">Acerca</a></li>
                    <li><a class="nav-link scrollto" href="#services">Promociones</a></li>
                    <li><a class="nav-link scrollto " href="{{route('centros-acopios')}}">Centros de Acopios</a></li>

                    <li class="dropdown"><a href="#"><span>Paginas</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('materiales-aceptamos')}}">Materiales que aceptamos</a></li>

                            <li><a href="{{route('educacion-ambiental')}}">Educacion ambiental</a></li>

                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Canjear</a></li>
                    @guest
                        <li><a style="background-color: #2D6244;" class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @else
                    <div class="dropdown">
                        <button class="btn btn-small dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Session::get('Foto') }}" class="rounded-circle" alt="Foto de perfil" width="40">

                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><a class="dropdown-item" href="{{route('perfil')}}">Perfil</a></li>
                            <li><a class="dropdown-item" href="{{route('recepcion-material')}}">Entregar materiales</a></li>
                            <li>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    
                    @endguest

                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div><!-- End Header Container -->
    </div>
</header>

<section class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>@yield('seccion')</h2>
            <ol>
                <li><a href="">Inicio</a></li>
                <li>@yield('seccion')</li>
            </ol>
        </div>

    </div>
</section>
