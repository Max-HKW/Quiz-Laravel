{{-- resources/views/quiz/game_question.blade.php --}}
@extends('layout')

@section('content')
    <h2>Gara - {{ ucfirst($type) }}</h2>

    @if (session('message'))
    <div style="color: orange; margin-bottom: 15px;">
        {{ session('message') }}
    </div>
    @endif

    <p>Domanda {{ $index + 1 }} di {{ $totalQuestions }}</p>
    {{-- TIMER VISIBILE --}}
    <div id="timer" style="font-size: 1.5em; color: red; margin-bottom: 20px;">
        Tempo rimasto: <span id="countdown">10</span>s
    </div>

    <form id="quizForm" method="POST" action="{{ route('quiz.game.answer', ['type' => $type]) }}">
        @csrf

        <p><strong>
            @if ($type === 'capital')
                Qual è la capitale di {{ $country->name }}?
            @else
                Quale bandiera appartiene a {{ $country->name }}?
                <br>
                <img src="{{ asset('flags/' . strtolower($country->alpha2Code) . '.png') }}"
                     alt="Bandiera di {{ $country->name }}"
                     style="width: 150px; height: auto; margin-top: 10px;">
            @endif
        </strong></p>

        @foreach ($options as $option)
            <div>
                <label>
                    <input type="radio" name="answer" value="{{ $option }}" required>
                    {{ $type === 'capital' ? $option : strtoupper($option) }}
                </label>
            </div>
        @endforeach

        <button type="submit">Invia risposta</button>
         <a href="{{ route('home')}}">Home</a>
    </form>

    <script>
        let seconds = 10;
        const countdownEl = document.getElementById('countdown');

        const timer = setInterval(() => {
            seconds--;
            countdownEl.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(timer);
                document.getElementById('quizForm').submit();
            }
        }, 1000);
    </script>
@endsection
