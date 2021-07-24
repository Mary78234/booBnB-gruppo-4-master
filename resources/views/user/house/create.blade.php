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
    
    <form class="bg-light" action="{{route('user.house.store')}}" method="POST">
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
            <input type="number" onKeyPress="if(this.value.length==3) return false;" id="beds" name="beds" class="form-control @error('beds') is-invalid @enderror" value="{{ old('beds') }}">
            @error('beds')
            <div class="text-danger">{{ $message }}</div>
           @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="bathrooms">BAGNI:</label>
            <input type="number" onKeyPress="if(this.value.length==3) return false;" id="bathrooms" name="bathrooms" class="form-control @error('bathrooms') is-invalid @enderror" value="{{ old('bathrooms') }}">
            @error('bathrooms')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" onKeyPress="if(this.value.length==4) return false;" id="square_metre" name="square_metre" class="form-control" value="{{ old('square_metre') }}">
        </div>

        <div class="mt-2">
            <label class="label-control" for="country">STATO:</label>
            <input type="text" id="country" name="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country') }}">
            @error('country')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="region">REGIONE:</label>
            <input type="text" id="region" name="region" class="form-control @error('region') is-invalid @enderror" value="{{ old('region') }}">
            @error('region')
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
            <input type="text" onKeyPress="if(this.value.length==4) return false;"  id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="house_number">NUMERO CIVICO:</label>
            <input type="number" onKeyPress="if(this.value.length==4) return false;" id="house_number" name="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number') }}">
            @error('house_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mt-2">
            <label class="label-control" max="99999" for="postal_code">CODICE POSTALE:</label>
            <input type="number" onKeyPress="if(this.value.length==4) return false;" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}">
            @error('postal_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <H3>Altri Servizi:</H3>
            <div class="form-check">
                @foreach ($features as $feature)
        
                <label
                  for="{{ $feature->id }}"
                  class="form-check-label search__checkbox--label mr-3"
                >
                  <input
                    name="features[]"
                    type="checkbox"
                    id="{{ $feature->id }}"
                    value="{{ $feature->id }}"
                    class="search__checkbox--quad"
                    {{ ( in_array($feature->id, old('features', array())) ) ? 'checked ' : '' }}
                  >
                  {{ $feature->name }}
                </label>
                @endforeach
        </div>


        <div class="mt-2">
            <button class="btn btn-primary" type="submit">INSERISCI</button>
            <button class="btn btn-danger" type="reset">RESET</button>
        </div>


    </form>

</div>
@endsection