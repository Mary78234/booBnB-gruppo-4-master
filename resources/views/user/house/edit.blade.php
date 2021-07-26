@extends('layouts.app')

@section('content')
<div class="container">
    
    
    <h1>MODIFICA: {{ $house->title }}</h1>

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
    
    <p>Cambia immagine? {{ $house->image }}</p>
    
    <form action="{{route('user.house.update', $house)}}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>
            <input type="text" id="title" name="title" value="{{ old('title', $house->title) }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- caricamento immagine provvisorio --}}
        <div class="mt-2">
            <label class="label-control" for="image">INSERISCI IMMAGINE(momentaneo)</label>
            <input type="text" id="image" name="image" value="{{ old('image', $house->image) }}" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3">{{ old('description', $house->description) }}</textarea>
        </div>
    
        <div class="mt-2">
            <label class="label-control" for="beds">LETTI:</label>
            <input type="number" max="99" id="beds" name="beds" value="{{ old('beds', $house->beds) }}" class="form-control @error('beds') is-invalid @enderror">
            @error('beds')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control"  for="bathrooms">BAGNI:</label>
            <input type="number" max="99" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $house->bathrooms) }}" class="form-control @error('bathrooms') is-invalid @enderror">
            @error('bathrooms')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" max="9999" id="square_metre" name="square_metre" value="{{ old('square_metre', $house->square_metre) }}" class="form-control">
        </div>

        <div class="mt-2">
            <label class="label-control" for="country">STATO:</label>
            <input type="text" id="country" name="country" value="{{ old('country', $house->country) }}" class="form-control @error('country') is-invalid @enderror">
            @error('country')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="region">REGIONE:</label>
            <input type="text" id="region" name="region" value="{{ old('region', $house->region) }}" class="form-control @error('region') is-invalid @enderror">
            @error('region')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="city">CITTA':</label>
            <input type="text" id="city" name="city" value="{{ old('city', $house->city)}}" class="form-control @error('city') is-invalid @enderror">
            @error('city')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="address">INDIRIZZO:</label>
            <input type="text" id="address" name="address" value="{{ old('address', $house->address)}}" class="form-control @error('address') is-invalid @enderror">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="house_number">NUMERO CIVICO:</label>
            <input type="number" max="999" id="house_number" name="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number', $house->house_number) }}">
            @error('house_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mt-2">
            <label class="label-control" for="postal_code">CODICE POSTALE:</label>
            <input type="number" max="99999" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $house->postal_code) }}">
            @error('postal_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
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