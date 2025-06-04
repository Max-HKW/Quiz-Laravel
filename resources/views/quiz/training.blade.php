@extends('layout')

@section('content')
    <h2>Allenamento - {{ ucfirst($type) }}</h2>

    @if ($type === 'capital')
        <p>La capitale di <strong>{{ $country->name }}</strong> è <strong>{{ $country->capital }}</strong>.</p>
    @elseif ($type === 'flag')
        <p>La bandiera di <strong>{{ $country->name }}</strong>:</p>
        <img src="{{ $flagPath }}" alt="Bandiera di {{ $country->name }}" style="width:150px; height:auto;">
@endif



    <a href="{{ route('quiz.training', ['type' => $type]) }}">Prossima</a>
    <a href="{{ route('home')}}">Home</a>
@endsection
