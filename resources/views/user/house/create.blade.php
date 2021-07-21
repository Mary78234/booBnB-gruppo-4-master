@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>INSERISCI UNA NUOVA CASA:</h1>
    
    <p>Cambia immagine?</p>
    
    <form class="bg-light" action="{{route('user.house.store')}}" method="POST">
        @csrf
        @method('POST')

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mt-2">
            <label class="label-control" for="beds">LETTI:</label>
            <input type="number" id="beds" name="beds" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="bathrooms">BAGNI:</label>
            <input type="number" id="bathrooms" name="bathrooms" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" id="square_metre" name="square_metre" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="country">PAESE:</label>
            <input type="text" id="country" name="country" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="city">CITTA':</label>
            <input type="text" id="city" name="city" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="address">INDIRIZZO:</label>
            <input type="text" id="address" name="address" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="lat">LATITUDINE:</label>
            <input type="number" id="lat" name="lat" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="long">LONGITUDINE:</label>
            <input type="number" id="long" name="long" class="form-control">
        </div>

        <div class="mt-2">
            <button class="btn btn-primary" type="submit">INSERISCI</button>
            <button class="btn btn-danger" type="reset">RESET</button>
        </div>

    </form>

</div>
@endsection