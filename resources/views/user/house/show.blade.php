@extends('layouts.app')

@section('content')
<div class="container bg-light">
    
    <h1>DETTAGLI CASA: {{ $house->title }}</h1>
    
    <p>qui inseriamo l'immagine? {{ $house->image }}</p>
    
    <p>{{ $house->description }}</p>

    <h2>Caratteristiche:</h2>
    <ul>
        <li>Numero letti: {{ $house->beds }}</li>
        <li>Bagni: {{ $house->bathrooms }}</li>
        <li>Dimensione: {{ $house->square_metre }} metri quadri</li>
        <li>Paese: {{ $house->country }}</li>
        <li>Città: {{ $house->city }}</li>
        <li>Indirizzo: {{ $house->address }}</li>
        <li>Latitudine: {{ $house->lat }}</li>
        <li>Longitudine: {{ $house->long }}</li>
    </ul>
    

    <div>
        <a class="btn btn-dark" href="{{ route('user.house.edit', $house) }}">Modifica</a>
    </div>
    {{-- SEZIONE MESSAGGI DA TERMINARE --}}
    <h1>Lista Messaggi:</h1>
    <ul>
        @foreach ($messages as $message)
            <li>
                <h5>{{ $message->title }}</h5>
                <p>{{ $message->content }}</p>
            </li>
        @endforeach
    </ul>
    <h1>STATISTICHE</h1>
    
</div>
@endsection


{{-- <a href="http://localhost:8000/house">Visualizza risultato finale</a><br>
    <a href="{{ route('user.house.edit', $id ='0') }}">Modifica casa</a><br>
    <a href="{{ route('user.message.show', $id ='0') }}">messaggi casa</a><br>
    <a href="{{ route('user.sponsor') }}">sponsorizza</a> --}}