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
    </form> --}}

{{-- @extends('layout')

@section('content')
    <h2 class="quiz-title">Gara - {{ ucfirst($type) }}</h2>

    @if (session('message'))
        <div class="quiz-message">
            {{ session('message') }}
        </div>
    @endif

    <p class="quiz-progress">Domanda {{ $index + 1 }} di {{ $totalQuestions }}</p>

    <div id="timer" class="quiz-timer">
        Tempo rimasto: <span id="countdown">10</span>s
    </div>

    <form action="{{ route('quiz.game.answer', ['type' => $type]) }}" method="POST">
    @csrf
    <h2 class="text-lg font-semibold mb-4">
        @if($type === 'capital')
            Qual è la capitale di <strong>{{ $country->name }}</strong>?
        @else
            Qual è la bandiera di <strong>{{ $country->name }}</strong>?
        @endif
    </h2>

    <div class="grid grid-cols-2 md:grid-cols-{{ count($options) <= 4 ? 2 : 3 }} gap-4">
        @foreach ($options as $option)
            <label class="option-label block cursor-pointer">
                <input type="radio" name="answer"
                       value="{{ $type === 'capital' ? $option : $option->alpha2Code }}"
                       required class="hidden-radio">

                @if ($type === 'capital')
                    <div class="p-3 border rounded bg-white text-center shadow">
                        {{ $option }}
                    </div>
                @else
                    <img src="{{ asset('flags/' . strtolower($option->alpha2Code) . '.png') }}"
                         alt="Bandiera di {{ $option->name }}"
                         class="option-image border rounded shadow hover:scale-105 transition">
                @endif
            </label>
        @endforeach
    </div>

    <div class="mt-6 text-center">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded">
            Conferma Risposta
        </button>
    </div>
</form> --}}

  
{{-- @endsection --}}


{{-- <script>
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
</script> --}}
{{-- @endsection --}}

{{-- @extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/quiz.css') }}">

<div class="quiz-container">
    <h2 class="quiz-title">
        @if($type === 'capital')
            Qual è la capitale di <span class="highlight">{{ $country->name }}</span>?
        @else
            Qual è la bandiera di <span class="highlight">{{ $country->name }}</span>?
        @endif
    </h2>

    <form action="{{ route('quiz.game.answer', ['type' => $type]) }}" method="POST">
        @csrf

        <div class="options-grid options-{{ count($options) }}">
            @foreach ($options as $option)
                <label class="option-card">
                    <input 
                        type="radio" 
                        name="answer" 
                        value="{{ $type === 'capital' ? $option : $option->alpha2Code }}"
                        required
                    >

                    <div class="option-content">
                        @if ($type === 'capital')
                            <span class="option-text">{{ $option }}</span>
                        @else
                            <img 
                                src="{{ asset('flags/' . strtolower($option->alpha2Code) . '.png') }}" 
                                alt="Bandiera di {{ $option->name }}" 
                                class="option-flag"
                            >
                        @endif
                    </div>
                </label>
            @endforeach
        </div>

        <div class="submit-container">
            <a href="{{ route('home')}}">Home</a>
            <button type="submit" class="submit-button">Conferma Risposta</button>
        </div>
    </form>

    <div class="progress-info">
        Domanda {{ $index + 1 }} di {{ $totalQuestions }}
    </div>
</div>

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

        function selectOption(imgEl) {
            document.querySelectorAll('.flag-img').forEach(img => {
                img.classList.remove('selected');
            });

            imgEl.classList.add('selected');
            imgEl.previousElementSibling.checked = true;
        }
    </script>
@endsection --}}

@extends('layout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/quiz.css') }}">

<div class="quiz-container">
    <h2 class="quiz-title">
        @if($type === 'capital')
            Qual è la capitale di <span class="highlight">{{ $country->name }}</span>?
        @else
            Qual è la bandiera di <span class="highlight">{{ $country->name }}</span>?
        @endif
    </h2>

    {{-- Aggiungi visualizzazione countdown --}}
    <div class="countdown-timer">
        Tempo rimasto: <span id="countdown">10</span> secondi
    </div>

    {{-- Aggiungi ID al form --}}
    <form id="quizForm" action="{{ route('quiz.game.answer', ['type' => $type]) }}" method="POST">
        @csrf

        <div class="options-grid options-{{ count($options) }}">
            @foreach ($options as $option)
                <label class="option-card">
                    <input 
                        type="radio" 
                        name="answer" 
                        value="{{ $type === 'capital' ? $option : $option->alpha2Code }}"
                        required
                    >

                    <div class="option-content">
                        @if ($type === 'capital')
                            <span class="option-text">{{ $option }}</span>
                        @else
                            <img 
                                src="{{ asset('flags/' . strtolower($option->alpha2Code) . '.png') }}" 
                                alt="Bandiera di {{ $option->name }}" 
                                class="option-flag"
                            >
                        @endif
                    </div>
                </label>
            @endforeach
        </div>

        <div class="submit-container">
            <a href="{{ route('home') }}">Home</a>
            <button type="submit" class="submit-button">Conferma Risposta</button>
        </div>
    </form>

    <div class="progress-info">
        Domanda {{ $index + 1 }} di {{ $totalQuestions }}
    </div>
</div>

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
