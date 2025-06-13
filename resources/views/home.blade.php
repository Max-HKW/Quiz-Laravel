@extends('layout')

@section('content')
    {{-- <h1>Quiz sui Paesi del Mondo</h1> --}}

    <h2>Scegli una modalità:</h2>

    <div class="option-container">

        {{-- Modalità Allenamento --}}
        <div class="option-content">
            <h3>Allenamento</h3>
            <ul class="option-list">
                <li class="option-item"><a href="{{ route('quiz.training', ['type' => 'capital']) }}">Capitali</a></li>
                <li class="option-item"><a href="{{ route('quiz.training', ['type' => 'flag']) }}">Bandiere</a></li>
            </ul>
        </div>

        {{-- Modalità Gara --}}
        <div class="option-content">
            <h3>Gara</h3>
            <ul class="option-list">
                <li class="option-item"><a href="{{ route('quiz.game.selectDifficulty', ['type' => 'capital']) }}">Capitali</a></li>
                <li class="option-item"><a href="{{ route('quiz.game.selectDifficulty', ['type' => 'flag']) }}">Bandiere</a></li>
            </ul>
        </div>

    </div>
@endsection
