{{-- resources/views/quiz/game_question.blade.php --}}
{{-- @extends('layout')

@section('content')
    <h2>Gara - {{ ucfirst($type) }}</h2>

    @if (session('message'))
    <div style="color: orange; margin-bottom: 15px;">
        {{ session('message') }}
    </div>
    @endif

    <p>Domanda {{ $index + 1 }} di {{ $totalQuestions }}</p> --}}
{{-- TIMER VISIBILE --}}
{{-- <div id="timer" style="font-size: 1.5em; color: red; margin-bottom: 20px;">
        Tempo rimasto: <span id="countdown">10</span>s
    </div>

    <form id="quizForm" method="POST" action="{{ route('quiz.game.answer', ['type' => $type]) }}">
        @csrf

        <p><strong>
            @if ($type === 'capital')
                Qual è la capitale di {{ $country->name }}?
            @else
                Di che stato é questa bandiera?
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
@endsection --}}

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
                @elseif ($type === 'flag')
                    Qual è la bandiera dello stato {{ $country->name }}?
                @endif
            </strong></p>

        <div style="display: flex; gap: 20px; margin-top: 20px; flex-wrap: wrap;">
            @foreach ($options as $option)
                <label style="cursor: pointer;">
                    <input type="radio" name="answer" value="{{ $option->alpha2Code }}" required style="display: none;">
                    <img src="{{ asset('flags/' . strtolower($option->alpha2Code) . '.png') }}"
                        alt="Bandiera di {{ $option->name }}"
                        style="width: 150px; height: auto; border: 2px solid transparent;" onclick="selectOption(this)">
                </label>
            @endforeach
        </div>

        <a href="{{ route('home') }}">Home</a>
        <button type="submit" style="margin-top: 20px;">Invia risposta</button>
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

        // Evidenzia l'immagine selezionata
        function selectOption(imgEl) {
            document.querySelectorAll('img').forEach(img => {
                img.style.border = "2px solid transparent";
            });

            imgEl.style.border = "2px solid blue";
            imgEl.previousElementSibling.checked = true;
        }
    </script>
@endsection
