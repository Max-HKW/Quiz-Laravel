@extends('layout')

@section('content')
    <h2>Test - {{ ucfirst($type) }}</h2>

    @if ($type === 'capital')
        <p>Qual è la capitale di <strong>{{ $country->name }}</strong>?</p>
    @elseif ($type === 'flag')
        <p>Qual è la bandiera di <strong>{{ $country->name }}</strong>?</p>
    @endif

    <form method="POST" action="#">
        @csrf
        @foreach ($options as $option)
            <div>
                @if ($type === 'capital')
                    <input type="radio" name="answer" value="{{ $option }}" id="{{ $option }}">
                    <label for="{{ $option }}">{{ $option }}</label>
                @else
                    <input type="radio" name="answer" value="{{ $option }}" id="{{ $loop->index }}">
                    <label for="{{ $loop->index }}">
                        <img src="{{ asset('images/flags/' . strtolower($option) . '.png') }}" alt="Bandiera {{ $option }}" style="width:100px; height:auto;">
                    </label>
                @endif
            </div>
        @endforeach

        <button type="submit">Invia</button>
    </form>
@endsection
