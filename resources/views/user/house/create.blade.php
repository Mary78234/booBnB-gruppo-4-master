@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>INSERISCI UNA NUOVA CASA:</h1>

    {{-- ERRORI --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{route('user.house.store')}}" method="POST">
        @csrf
        @method('POST')

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- poi da sostituire --}}
        <div class="mt-2">
            <label class="label-control" for="image">INSERISCI IMMAGINE(momentaneo)</label>
            <input type="text" id="image" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3">{{old('description')}}</textarea>
        </div>

        <div class="mt-2">
            <label class="label-control" for="beds">LETTI:</label>
            <input type="number" id="beds" name="beds" class="form-control @error('beds') is-invalid @enderror" value="{{ old('beds') }}">
            @error('beds')
            <div class="text-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="bathrooms">BAGNI:</label>
            <input type="number" id="bathrooms" name="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror" value="{{ old('bathrooms') }}">
            @error('bathrooms')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" id="square_metre" name="square_metre" class="form-control" value="{{ old('square_metre') }}">
        </div>

        <div class="mt-2">
            <label class="label-control" for="country">PAESE:</label>
            <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}">
            @error('country')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="city">CITTA':</label>
            <input type="text" id="city" name="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city') }}">
            @error('city')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="address">INDIRIZZO:</label>
            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- LAT E LONG sono da RIMUOVERE --}}
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