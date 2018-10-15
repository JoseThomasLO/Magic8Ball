<?php
use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello!');
});

$botman->hears('Acerca de'|'about', function ($bot) {
    $bot->reply('Bot que resuelve todas tus preguntas de Si o No. Desarrollado por Jose Thomas Lopez Osorio.');
});

$botman->hears('Start conversation', BotManController::class.'@startConversation');
