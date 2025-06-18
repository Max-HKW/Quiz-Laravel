{{-- @extends('layout')

@section('content')
    <h2>Risultato modalità gara - {{ ucfirst($type) }}</h2>
    <p>Punteggio finale: {{ $score }} / 10</p>

    <table border="1">
        <tr>
            <th>Domanda</th>
            <th>Risposta Data</th>
            <th>Corretta</th>
            <th>Esito</th>
        </tr>
        @foreach ($answers as $a)
            <tr>
                <td>{{ $a['question'] }}</td>
                <td>{{ $a['your_answer'] }}</td>
                <td>{{ $a['correct_answer'] }}</td>
                <td>{{ $a['result'] }}</td>
            </tr>
        @endforeach
    </table>

    <a href="{{ route('home') }}">Torna alla home</a>
@endsection --}}

@extends('layout')

@section('content')
    <h2 class="result-title">Risultato modalità gara - {{ ucfirst($type) }}</h2>
    <p class="final-score">Punteggio finale: {{ $score }} / 10</p>

    <table class="result-table">
        <thead>
            <tr>
                <th>Domanda</th>
                <th>Risposta Data</th>
                <th>Corretta</th>
                <th>Esito</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($answers as $a)
                <tr>
                    <td>{{ $a['question'] }}</td>
                    <td>{{ $a['your_answer'] }}</td>
                    <td>{{ $a['correct_answer'] }}</td>
                    <td class="{{ $a['result'] === 'Corretta' ? 'correct' : 'wrong' }}">
                        {{ $a['result'] }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('home') }}" class="back-home-link">Torna alla home</a>
@endsection
