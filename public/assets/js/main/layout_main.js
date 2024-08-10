// Muestra el loader
function showLoader() {
    document.getElementById('loader').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Oculta el loader
function hideLoader() {
    document.getElementById('loader').style.display = 'none';
    document.body.style.overflow = '';
}


function someFunction() {
    showLoader();
    
    // Simula una operación que toma tiempo (como una solicitud AJAX)
    setTimeout(function() {
        // Tu lógica aquí...

        // Luego de la operación, ocultar el loader
        hideLoader();
    }, 3000); // Espera 3 segundos antes de ocultar el loader
}

someFunction();

// Ejemplo de ocultar el loader cuando la página está completamente cargada
// window.addEventListener('load', function() {
//     hideLoader();
// });

