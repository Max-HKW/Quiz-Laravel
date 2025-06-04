@extends('layout')

@section('content')
    {{-- <h1>Quiz sui Paesi del Mondo</h1> --}}

    <h2>Scegli una modalità:</h2>

    <div style="display: flex; gap: 40px; margin-top: 20px;">

        {{-- Modalità Allenamento --}}
        <div>
            <h3>Allenamento</h3>
            <ul>
                <li><a href="{{ route('quiz.training', ['type' => 'capital']) }}">Capitali</a></li>
                <li><a href="{{ route('quiz.training', ['type' => 'flag']) }}">Bandiere</a></li>
            </ul>
        </div>

        {{-- Modalità Gara --}}
        <div>
            <h3>Gara</h3>
            <ul>
                <li><a href="{{ route('quiz.game.selectDifficulty', ['type' => 'capital']) }}">Capitali</a></li>
                <li><a href="{{ route('quiz.game.selectDifficulty', ['type' => 'flag']) }}">Bandiere</a></li>
            </ul>
        </div>

    </div>
@endsection
