<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Acerca de|about|acerca', function ($bot) {
    $bot->reply('Bot que resuelve todas tus preguntas de Si o No. Desarrollado por Jose Thomas Lopez Osorio.');
});

// Opcion default
$botman->fallback(function($bot) {
    $bot->reply('Lo siento, no entendí tu mensaje. Puedes preguntarme cualquier cosa (debe terminar con ?), ademas del comando about');
});

//Resuelve las preguntas
$botman->hears('{pregunta}\?', function($bot, $pregunta) {

    $respuesta = rand(0, 19);  //Define si la respuesta es positiva, negativa o duda.
    if($respuesta <= 9) //Respuesta positiva
    {
        $mensaje = rand(0, 9); //Define el mensaje a mostrar.
        switch($mensaje)
        {
            case 0: 
                    $bot->reply('En mi opinión, si');
                    break;
            case 1:
                    $bot->reply('Es cierto');
                    break;
            case 2:
                    $bot->reply('Es decididamente asi');
                    break;
            case 3:
                    $bot->reply('Probablemente');
                    break;
            case 4:
                    $bot->reply('Buen pronóstico');
                    break;
            case 5:
                    $bot->reply('Todo apunta a que si');
                    break;
            case 6:
                    $bot->reply('Sin duda');
                    break;
            case 7:
                    $bot->reply('Si');
                    break;
            case 8:
                    $bot->reply('Definitivamente');
                    break;
            case 9:
                    $bot->reply('Puedes contar con ello');
                    break;
            default:
                    $bot->reply('Ups, hubo un error :(');
                    break;
        }
    }
    if($respuesta >= 10 & $respuesta < 14) //Respuesta de duda
    {
        $mensaje = rand(0, 4); //Define el mensaje a mostrar.
        switch($mensaje)
        {
            case 0: 
                    $bot->reply('Respuesta vaga, vuelve a intentarlo');
                    break;
            case 1:
                    $bot->reply('Pregunta en otro momento');
                    break;
            case 2:
                    $bot->reply('Será mejor que no te lo diga ahora');
                    break;
            case 3:
                    $bot->reply('No puedo predecirlo ahora');
                    break;
            case 4:
                    $bot->reply('Concéntrate y vuelve a preguntar');
                    break;
            default:
                    $bot->reply('Ups, hubo un error :(');
                    break;
        }
    }
    if($respuesta >= 14) //Respuesta negativa
    {
        $mensaje = rand(0, 4); //Define el mensaje a mostrar.
        switch($mensaje)
        {
            case 0: 
                    $bot->reply('No cuentes con ello');
                    break;
            case 1:
                    $bot->reply('Mi respuesta es no');
                    break;
            case 2:
                    $bot->reply('Mis fuentes dicen que no');
                    break;
            case 3:
                    $bot->reply('Las predicciones no son buenas');
                    break;
            case 4:
                    $bot->reply('Muy dudoso');
                    break;
            default:
                    $bot->reply('Ups, hubo un error :(');
                    break;
        }
    }
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
