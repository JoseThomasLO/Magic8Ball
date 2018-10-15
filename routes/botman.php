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
    $bot->reply('Lo siento, no entendí tu mensaje. Puedes preguntarme cualquier cosa, ademas del comando about');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
