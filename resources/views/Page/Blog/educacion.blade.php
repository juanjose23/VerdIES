@extends('Layouts.layout1')
@section('title', 'Inicio')
@section('seccion', 'Educación ambiental')
@section('content')
<style>
    .custom-card {
    background-color: #f8f9fa;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.custom-card .card-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #333;
}

.custom-card #weatherData p {
    font-size: 1.2rem;
    color: #555;
}

.custom-card #weatherData p.mb-2 {
    margin-bottom: 0;
}

</style>
<section id="educacion-ambiental" class="container">
    <div class="blog-title">
        <h2>Educación Ambiental</h2>
        <p>Aprende sobre la importancia de proteger nuestro planeta a través de nuestros artículos informativos y recursos educativos.</p>
    </div>

    <div class="row mt-5">
        <div class="col-6 mt-4">
            <h3 class="mb-3">Datos del Clima</h3>
            <div id="weather" class="card p-3 custom-card shadow">
                <div class="card-body">
                    <h5 class="card-title mb-4">Clima en <span id="cityName">Managua</span></h5>
                    <div id="weatherData" class="d-flex align-items-center">
                        <i class='bx bx-water'></i>
                        <p class="mb-2">Cargando datos del clima...</p>
                    </div>
                </div>
            </div>
        </div>
        <section id="about" class="about">
            <div class="container">
    
                <div class="row content align-items-center">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <h3>Cómo Reciclar desde Casa:</h3>
                        <p>Reciclar desde casa es una forma sencilla pero poderosa de contribuir al cuidado del medio ambiente. Aquí te damos algunos pasos para comenzar:</p>
                        <ul>
                            <li> <i class="bi bi-check-circle me-2 text-success"></i> Organiza tus residuos: Separa los materiales reciclables como plástico, vidrio, papel y cartón del resto de los desechos.</li>
                            <li> <i class="bi bi-check-circle me-2 text-success"></i> Consulta las regulaciones locales: Infórmate sobre las normativas de reciclaje en tu área para saber qué materiales se pueden reciclar y cómo deben ser separados.</li>
                            <li> <i class="bi bi-check-circle me-2 text-success"></i> Utiliza contenedores de reciclaje: Coloca contenedores de reciclaje en tu hogar para facilitar la separación de los materiales reciclables.</li>
                            <li> <i class="bi bi-check-circle me-2 text-success"></i> Reduce el consumo de plástico: Opta por productos reutilizables y evita el uso de plásticos de un solo uso siempre que sea posible.</li>
                            <li> <i class="bi bi-check-circle me-2 text-success"></i> Reutiliza y dona: Antes de desechar algo, considera si puede ser reutilizado o donado a alguien que lo necesite.</li>
                        </ul>
                        <p>Recuerda que cada pequeño gesto cuenta cuando se trata de proteger nuestro planeta. ¡Haz tu parte y recicla desde casa!</p>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <h3>Educación Ambiental:</h3>
                        <p>La educación ambiental es fundamental para crear conciencia sobre la importancia de proteger nuestro planeta. Aquí hay algunos pasos que puedes seguir para promover la educación ambiental:</p>
                        <ol>
                            <li>Organiza eventos educativos: Organiza charlas, talleres o actividades al aire libre para enseñar a las personas sobre temas ambientales.</li>
                            <li>Crea materiales educativos: Desarrolla folletos, carteles o recursos en línea que proporcionen información sobre la conservación del medio ambiente.</li>
                            <li>Involucra a la comunidad: Trabaja con escuelas, organizaciones locales y grupos comunitarios para promover la educación ambiental en tu área.</li>
                            <li>Fomenta el contacto con la naturaleza: Organiza excursiones o actividades al aire libre para que las personas puedan experimentar la belleza y fragilidad de nuestro entorno natural.</li>
                            <li>Actúa como ejemplo: Practica hábitos sostenibles en tu vida diaria y comparte tus experiencias con los demás para inspirar un cambio positivo.</li>
                        </ol>
                        <p>La educación ambiental es clave para construir un futuro más sostenible y equilibrado para todos. ¡Únete a nosotros en nuestra misión de proteger y preservar nuestro planeta!</p>
                    </div>
                </div>
    
            </div>
        </section>
    </div>
</section>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch weather data from OpenWeatherMap API
            const apiKey = '2697dd39f625b16c7a0006cbf98fb849'; // Replace with your OpenWeatherMap API key
            const city = 'managua'; // Replace with the desired city
            const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric&lang=es`;

            const weatherContainer = document.getElementById('weather');

    // Función para mostrar una animación de carga
    function showLoader() {
        weatherContainer.innerHTML = '<div class="text-center"><div class="spinner-border" role="status"><span class="visually-hidden">Cargando...</span></div></div>';
    }

    // Función para mostrar los datos del clima
    function showWeather(data) {
        weatherContainer.innerHTML = `
              <p class="mb-2"><strong>Temperatura:</strong> ${data.main.temp} °C</p>
        <p class="mb-2"><strong>Humedad:</strong> ${data.main.humidity} %</p>
        <p class="mb-0"><strong>Condición:</strong> ${data.weather[0].description}</p>
        `;
    }

    // Función para manejar errores
    function showError(message) {
        weatherContainer.innerHTML = `<p>${message}</p>`;
    }

    // Obtener datos del clima
    function getWeatherData() {
        showLoader();

        fetch(url)
            .then(response => {
                if (!response.ok) {
                    throw new Error('No se pudo obtener los datos del clima.');
                }
                return response.json();
            })
            .then(data => {
                showWeather(data);
            })
            .catch(error => {
                showError(error.message);
            });
    }

    // Obtener datos del clima al cargar la página
    getWeatherData();

    // Actualizar los datos del clima cada 10 minutos
    setInterval(getWeatherData, 600000); // 10 minutos
        });
    </script>