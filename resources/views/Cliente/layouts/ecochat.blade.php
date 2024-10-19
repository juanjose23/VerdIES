<link rel="stylesheet" href="{{ asset('Cliente/assets/scss/ecochat/echochat.css') }}">


<!-- Contenedor de Bootstrap -->
<div class="container container-ecochat">
    <!-- Contenido de tu página -->

    <!-- Botón del Chatbot -->
    <div class="chatbot-icon">
        <i class='bx bx-leaf'></i>
    </div>
</div>

<!-- Chatbot -->


<div class="chatbot">
    <div class="header_ecochat">
        <div class="chatbot-icon_in_chat">
            <i class='bx bx-leaf'></i>
        </div>
        <h2 class="ml-2">EcoChat</h2>
        <span class="close-btn material-symbols-outlined">close</span>
    </div>
    <ul class="chatbox">
        <li class="chat incoming">
            <span class="bx bx-leaf"></span>
            <p>Hola 👋<br>¿En qué puedo ayudarte hoy?</p>


        </li>
    </ul>
    <div class="chat-input">
        <textarea placeholder="Escribe un mensaje..." spellcheck="false" required></textarea>
        <span id="send-btn" class="material-symbols-rounded">send</span>
    </div>
</div>


<!-- Main JS -->
<script src="{{ asset('Cliente/assets/js/ecochat/main.js') }}"></script>