<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container">
        <div class="header-container d-flex align-items-center justify-content-between">
            <div class="logo" style="background-color: #2D6244;">
                <img src="https://res.cloudinary.com/dxtlbsa62/image/upload/v1718135136/Verdies/qstueojoanvz5onacloo.png" alt="" class="img-fluid" height="100"></a>

                <!-- <a href="">-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto " href="{{redirect('/')}}">Inicio</a></li>
                    <li><a class="nav-link scrollto" href="{{route('acerca')}}">Acerca</a></li>
                    <li><a class="nav-link scrollto" href="{{route('acerca')}}">Promociones</a></li>
                    <li><a class="nav-link scrollto " href="{{route('acerca')}}">Centros de Acopios</a></li>

                    <li class="dropdown"><a href="#"><span>Paginas</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="#">Materiales que aceptamos</a></li>

                            <li><a href="#">Educacion ambiental</a></li>

                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="#contact">Canjear</a></li>
                    @guest
                        <li><a style="background-color: #2D6244;" class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li><a style="background-color: #2D6244;" class="getstarted scrollto" href="">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn  text-white" type="submit">
                                 Logout
                                </button>
                            </form>
                            </a></li>
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
