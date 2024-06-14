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
                    <li><a class="nav-link scrollto" href="{{route('canjes')}}">Promociones</a></li>
                    <li><a class="nav-link scrollto " href="{{route('centros-acopios')}}">Centros de Acopios</a></li>

                    <li class="dropdown"><a href="#"><span>Paginas</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{route('materiales-aceptamos')}}">Materiales que aceptamos</a></li>

                            <li><a href="{{route('educacion-ambiental')}}">Educacion ambiental</a></li>

                        </ul>
                    </li>
                    @guest
                
                   
                        <li><a style="background-color: #2D6244;" class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @else
                    <li><a class="nav-link scrollto" href="{{route('puntos')}}">Mis historial</a></li>
                    <div class="dropdown">
                        <button class="btn btn-small dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ Session::get('Foto') }}" class="rounded-circle" alt="Foto de perfil" width="50" height="50">

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

<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Bienvenido a VerdIES</h1>
        <h2>¡Únete a nosotros para promover el reciclaje y la sostenibilidad en la Universidad Nacional de Ingeniería!
        </h2>
        <a href="#about" class="btn-get-started scrollto">Descubre más</a>
    </div>
</section>
