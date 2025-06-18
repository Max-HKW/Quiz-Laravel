<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class QuizController extends Controller
{

    public function selectDifficulty($type)
{
    // Mostra una vista con un form per scegliere difficoltà
    return view('quiz.select_difficulty', compact('type'));
}

  public function training($type)
{
    $country = Country::inRandomOrder()->first();

    $flagPath = null;

    if ($type === 'flag' && $country) {
        $flagPath = asset('flags/' . strtolower($country->alpha2Code) . '.png');
    }

    return view('quiz.training', compact('country', 'type', 'flagPath'));
}

   public function test($type)
{
    $country = Country::inRandomOrder()->first();

    if ($type === 'capital') {
        $correctAnswer = $country->capital;

        $options = Country::where('capital', '!=', $correctAnswer)
            ->inRandomOrder()
            ->limit(2)
            ->pluck('capital')
            ->toArray();

    } elseif ($type === 'flag') {
        // Il codice alpha2 in minuscolo
        $correctAnswer = $country->name;

        $options = Country::where('alpha2Code', '!=', $country->alpha2Code)
            ->inRandomOrder()
            ->limit(2)
            ->pluck('name')
            ->map(fn($code) => strtolower($code))
            ->toArray();
    }

    // Aggiungo la risposta corretta e mescolo le opzioni
    $options[] = $correctAnswer;
    shuffle($options);

    // Creo il percorso alla bandiera solo se è quiz bandiere
    $flagPath = null;
    if ($type === 'flag') {
        $flagPath = asset('flags/' . strtolower($country->alpha2Code) . '.png');
    }

    return view('quiz.test', compact('country', 'type', 'options', 'correctAnswer', 'flagPath'));
}

public function startGame(Request $request, $type)
{
    $difficulty = $request->input('difficulty', 'easy');

    session()->forget(['questions', 'answers', 'score', 'current_index', 'difficulty']);

    $questions = Country::inRandomOrder()->limit(10)->get();
    session([
        'questions' => $questions,
        'answers' => [],
        'score' => 0,
        'current_index' => 0,
        'difficulty' => $difficulty,
    ]);

    return redirect()->route('quiz.game.question', ['type' => $type]);
}


public function nextQuestion($type)
{
    $index = session('current_index');
    $questions = session('questions');
    $difficulty = session('difficulty', 'easy');

    if ($index >= count($questions)) {
        return redirect()->route('quiz.game.result', ['type' => $type]);
    }

    $country = $questions[$index]; // quello da indovinare
    $correctAnswer = $type === 'capital' ? $country->capital : $country->alpha2Code; // cambiamo qui

    // Numero di opzioni in base a difficoltà
    $numOptions = 3;
    if ($difficulty === 'medium') $numOptions = 4;
    elseif ($difficulty === 'hard') $numOptions = 5;

    if ($type === 'capital') {
        $options = Country::where('capital', '!=', $correctAnswer)
            ->inRandomOrder()
            ->limit($numOptions - 1)
            ->pluck('capital')
            ->toArray();

        $options[] = $correctAnswer;
        shuffle($options);
    } else {
        // Domanda: Qual è la bandiera dello stato X?
        // Opzioni: array di oggetti Country con alpha2Code diversi
        $options = Country::where('alpha2Code', '!=', $country->alpha2Code)
            ->inRandomOrder()
            ->limit($numOptions - 1)
            ->get();

        // Aggiungi l'opzione corretta (il paese da indovinare)
        $options->push($country);
        $options = $options->shuffle();
    }

    $totalQuestions = count($questions);

    return view('quiz.game_question', compact('country', 'type', 'options', 'index', 'totalQuestions'));
}





public function submitAnswer(Request $request, $type)
{
    $questions = session('questions');
    $index = session('current_index');
    $score = session('score');
    $answers = session('answers');

    $country = $questions[$index];
    $correct = ($type === 'capital') ? $country->capital : $country->alpha2Code;


    $userAnswer = $request->input('answer');
    $isCorrect = $userAnswer === $correct;
    if ($isCorrect) {
        $score += 1;
        session()->flash('message', null); // nessun messaggio
    } elseif (empty($userAnswer)) {
        // Nessuna risposta data
        session()->flash('message', 'Tempo scaduto, risposta considerata errata');
    } else {
        session()->flash('message', null); // nessun messaggio
    }

    $answers[] = [
        'question' => $country->name,
        'your_answer' => $userAnswer ?: 'Nessuna risposta',
        'correct_answer' => $correct,
        'result' => $isCorrect ? '✅' : '❌'
    ];

    session(['current_index' => $index + 1, 'score' => $score, 'answers' => $answers]);

    return redirect()->route('quiz.game.question', ['type' => $type]);
}

public function showResult($type)
{
    $answers = session('answers', []);
    $score = session('score', 0);
    $totalQuestions = count(session('questions', []));

    return view('quiz.result', compact('answers', 'score', 'totalQuestions', 'type'));
}

    
}
