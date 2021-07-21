@extends('layouts.app')

@section('content')
<div class="container">
    
    
    <h1>MODIFICA: {{ $house->title }}</h1>
    
    <p>Cambia immagine? {{ $house->image }}</p>
    
    <form action="{{route('user.house.update', $house)}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>
            <input type="text" id="title" name="title" value="{{ $house->title }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3">{{ $house->description }}</textarea>
        </div>
        {{-- <li>Numero letti: {{ $house->beds }}</li>
        <li>Bagni: {{ $house->bathrooms }}</li>
        <li>Dimensione: {{ $house->square_metre }} metri quadri</li>
        <li>Paese: {{ $house->country }}</li>
        <li>Città: {{ $house->city }}</li>
        <li>Indirizzo: {{ $house->address }}</li>
        <li>Latitudine: {{ $house->lat }}</li>
        <li>Longitudine: {{ $house->long }}</li> --}}
        <div class="mt-2">
            <label class="label-control" for="beds">LETTI:</label>
            <input type="number" id="beds" name="beds" value="{{ $house->beds }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="bathrooms">BAGNI:</label>
            <input type="number" id="bathrooms" name="bathrooms" value="{{ $house->bathrooms }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" id="square_metre" name="square_metre" value="{{ $house->square_metre }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="country">PAESE:</label>
            <input type="text" id="country" name="country" value="{{ $house->country }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="city">CITTA':</label>
            <input type="text" id="city" name="city" value="{{ $house->city }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="address">INDIRIZZO:</label>
            <input type="text" id="address" name="address" value="{{ $house->address }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="lat">LATITUDINE:</label>
            <input type="number" id="lat" name="lat" value="{{ $house->lat }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="long">LONGITUDINE:</label>
            <input type="number" id="long" name="long" value="{{ $house->long }}" class="form-control">
        </div>

        <div class="mt-2">
            <button class="btn btn-primary" type="submit">Aggiorna</button>
        </div>

    </form>

    <a class="mt-2" href="http://localhost:8000/house">Visualizza risultato finale</a><br>
    
    <a class="mt-2 btn btn-dark" href="{{route('user.house.show', $house)}}">Ritorna</a>
    
    <form action="{{ route('user.house.destroy', $house) }}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger">ELIMINA</button>
    </form>
</div>  
@endsection