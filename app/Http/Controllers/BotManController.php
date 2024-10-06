<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use Illuminate\Http\Request;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\Drivers\Web\WebDriver;
use BotMan\BotMan\Cache\ArrayCache;

class BotManController extends Controller
{
    private $userState = []; // Almacena el estado del usuario

    public function __construct()
    {
        // Cargar el driver web
        DriverManager::loadDriver(WebDriver::class);
    }

    public function handle()
    {
        // Crear una instancia de BotMan utilizando ArrayCache para evitar caché en base de datos
        $botman = BotManFactory::create([], new ArrayCache);

        // Escuchar por mensajes
        $botman->hears('{message}', function($botman, $message) {
            $userId = $botman->getUser()->getId();

            // Verificar el estado del usuario
            $state = $this->userState[$userId] ?? 'initial'; // Estado inicial

            switch ($state) {
                case 'initial':
                    if ($message == 'hi' || $message == 'hello') {
                        $this->askName($botman);
                    } else {
                        $botman->reply("I didn't understand that. Type 'hi' to start.");
                    }
                    break;

                case 'awaiting_name':
                    $this->handleNameResponse($botman, $message);
                    break;

                case 'awaiting_assistance':
                    $this->handleAssistanceResponse($botman, $message);
                    break;

                default:
                    $botman->reply("I'm not sure what to do next. Type 'hi' to start over.");
            }
        });

        // Procesar los mensajes
        $botman->listen();
    }

    // Pregunta el nombre del usuario
    public function askName($botman)
    {
        $botman->ask('Hello! What is your name?', function (Answer $answer) use ($botman) {
            $name = $answer->getText();
            $botman->reply('Nice to meet you, ' . $name . '!');

            // Cambiar el estado del usuario a 'awaiting_assistance'
            $userId = $botman->getUser()->getId();
            $this->userState[$userId] = 'awaiting_assistance';
            $this->continueConversation($botman);
        });

        // Cambiar el estado a 'awaiting_name'
        $userId = $botman->getUser()->getId();
        $this->userState[$userId] = 'awaiting_name';
    }

    // Manejar la respuesta del nombre
    private function handleNameResponse($botman, $message)
    {
        // Responder con un mensaje de error
        $botman->reply("I didn't understand that. Please tell me your name.");
    }

    // Continuar la conversación después de que el nombre ha sido introducido
    public function continueConversation($botman)
    {
        $botman->ask('How can I assist you today?', function (Answer $answer) use ($botman) {
            $response = $answer->getText();
            $botman->reply("You said: $response");

            // Cambiar el estado a 'awaiting_assistance'
            $userId = $botman->getUser()->getId();
            $this->userState[$userId] = 'awaiting_assistance';

            $botman->reply("If you need 
            , type 'help' or type 'bye' to end the conversation.");
        });
    }

    // Manejar la respuesta de asistencia
    private function handleAssistanceResponse($botman, $message)
    {
        // Aquí puedes manejar diferentes tipos de asistencia
        $botman->reply("You asked for assistance with: $message");
    }

    // Muestra un menú de ayuda
    public function showHelp($botman)
    {
        $botman->reply("Here are some things you can ask me:");
        $botman->reply("- Say 'hi' or 'hello' to start a conversation.");
        $botman->reply("- Say 'bye' to end the conversation.");
        $botman->reply("- Type 'help' to see this message again.");
    }
}
