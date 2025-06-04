@extends('layout')

@section('content')
<h2>Scegli il livello di difficoltà per la gara di {{ ucfirst($type) }}</h2>

<form method="POST" action="{{ route('quiz.game.start', ['type' => $type]) }}">
    @csrf

    <label>
        <input type="radio" name="difficulty" value="easy" checked> Facile (3 opzioni)
    </label><br>

    <label>
        <input type="radio" name="difficulty" value="medium"> Medio (4 opzioni)
    </label><br>

    <label>
        <input type="radio" name="difficulty" value="hard"> Difficile (5 opzioni)
    </label><br>

    <button type="submit">Inizia la gara</button>
</form>
@endsection
