const chatbotToggler = document.querySelector(".chatbot-icon");
const closeBtn = document.querySelector(".close-btn");
const chatbox = document.querySelector(".chatbox");
const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");

let userMessage = null; // Variable to store user's message
const inputInitHeight = chatInput.scrollHeight;

// URL de la API local (Flask)
const API_URL = "http://127.0.0.1:5000/api/ecochat";

const createChatLi = (message, className) => {
    // Create a chat <li> element with passed message and className
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", `${className}`);
    let chatContent = className === "outgoing" ? `<p></p>` : `<span class="material-symbols-outlined">smart_toy</span><p></p>`;
    chatLi.innerHTML = chatContent;
    chatLi.querySelector("p").textContent = message;
    return chatLi; // return chat <li> element
}

const generateResponse = async (chatElement) => {
    const messageElement = chatElement.querySelector("p");

    // Define the properties and message for the API request
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            message: userMessage // Enviamos el mensaje del usuario al backend
        }),
    }

    try {
        const response = await fetch(API_URL, requestOptions);
        const data = await response.json();

        if (!response.ok) {
            // Si el límite de mensajes ha sido alcanzado
            if (response.status === 403) {
                messageElement.textContent = data.error; // Mostrar mensaje que indica límite diario
                sendChatBtn.disabled = true;  // Deshabilita el botón para enviar mensajes
                chatInput.disabled = true;    // Deshabilita el input
            } else {
                throw new Error(data.error);
            }
        } else {
            // Procesar la respuesta normalmente si no hay errores
            let botReply = data.reply;
            const currentCount = data.current_count;
            const totalMessages = data.total_messages;

            // Reemplaza las partes entre "**" con la etiqueta <strong> para negrita
            const formattedReply = botReply.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');

            // Maneja casos donde hay "1. **Texto en negrita**"
            const finalFormattedReply = formattedReply.replace(/(\d+\.\s)<strong>(.*?)<\/strong>/g, '<strong>$1$2</strong>');

            // Actualiza el mensaje en el DOM con el formato y el contador
            messageElement.innerHTML = `${finalFormattedReply}<br><text class="badge bg-label-success">${currentCount} de ${totalMessages}</text>`;
        }
    } catch (error) {
        // Muestra un mensaje de error general si ocurre algún problema
        messageElement.classList.add("error");
        messageElement.textContent = "Error en la comunicación con el servidor.";
    } finally {
        chatbox.scrollTo(0, chatbox.scrollHeight);
    }
}




const handleChat = () => {
    userMessage = chatInput.value.trim(); // Get user entered message and remove extra whitespace
    if (!userMessage) return;

    // Clear the input textarea and set its height to default
    chatInput.value = "";
    chatInput.style.height = `${inputInitHeight}px`;

    // Append the user's message to the chatbox
    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    chatbox.scrollTo(0, chatbox.scrollHeight);

    setTimeout(() => {
        // Display "Thinking..." message while waiting for the response
        const incomingChatLi = createChatLi("Thinking...", "incoming");
        chatbox.appendChild(incomingChatLi);
        chatbox.scrollTo(0, chatbox.scrollHeight);
        generateResponse(incomingChatLi);
    }, 600);
}

chatInput.addEventListener("input", () => {
    // Adjust the height of the input textarea based on its content
    chatInput.style.height = `${inputInitHeight}px`;
    chatInput.style.height = `${chatInput.scrollHeight}px`;
});

chatInput.addEventListener("keydown", (e) => {
    // If Enter key is pressed without Shift key and the window 
    // width is greater than 800px, handle the chat
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleChat();
    }
});

sendChatBtn.addEventListener("click", handleChat);
closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
