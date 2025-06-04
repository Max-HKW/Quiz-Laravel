<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/paesi',  [CountryController::class, 'index']);

Route::get('/quiz/training/{type}', [QuizController::class, 'training'])->name('quiz.training');
Route::get('/quiz/test/{type}', [QuizController::class, 'test'])->name('quiz.test');

// Modalità allenamento
Route::get('/training/{type}', [QuizController::class, 'training'])->name('quiz.training');

// Modalità gara - inizia la gara
Route::get('/game/{type}/start', [QuizController::class, 'startGame'])->name('quiz.game.start');

// Domanda corrente
Route::get('/game/{type}/question', [QuizController::class, 'nextQuestion'])->name('quiz.game.question');

// Invio risposta
Route::post('/game/{type}/answer', [QuizController::class, 'submitAnswer'])->name('quiz.game.answer');

// Report finale
Route::get('/game/{type}/result', [QuizController::class, 'showResult'])->name('quiz.game.result');

// Pagina per scegliere difficoltà
Route::get('/quiz/game/select-difficulty/{type}', [QuizController::class, 'selectDifficulty'])->name('quiz.game.selectDifficulty');

// Start gioco con difficoltà scelta
Route::post('/quiz/game/start/{type}', [QuizController::class, 'startGame'])->name('quiz.game.start');
