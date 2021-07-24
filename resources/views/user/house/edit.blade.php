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
    
    <form class="bg-light" action="{{route('user.house.update', $house)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>  
            <input type="text" id="title" name="title" value="{{ old('title', $house->title) }}" class="form-control @error('title') is-invalid @enderror">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3">{{ old('description', $house->description) }}</textarea>
        </div>
    
        <div class="mt-2">
            <label class="label-control" for="beds">LETTI:</label>
            <input type="number" onKeyPress="if(this.value.length==3) return false;" max="99" id="beds" name="beds" value="{{ old('beds', $house->beds) }}" class="form-control @error('beds') is-invalid @enderror">
            @error('beds')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control"  for="bathrooms">BAGNI:</label>
            <input type="number" onKeyPress="if(this.value.length==3) return false;" max="99" id="bathrooms" name="bathrooms" value="{{ old('bathrooms', $house->bathrooms) }}" class="form-control @error('bathrooms') is-invalid @enderror">
            @error('bathrooms')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="square_metre">METRI QUADRI:</label>
            <input type="number" onKeyPress="if(this.value.length==5) return false;" max="9999" id="square_metre" name="square_metre" value="{{ old('square_metre', $house->square_metre) }}" class="form-control">
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
            <input type="number" onKeyPress="if(this.value.length==3) return false;" max="999" id="house_number" name="house_number" class="form-control @error('house_number') is-invalid @enderror" value="{{ old('house_number', $house->house_number) }}">
            @error('house_number')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mt-2">
            <label class="label-control" for="postal_code">CODICE POSTALE:</label>
            <input type="number" onKeyPress="if(this.value.length==5) return false;" max="99999" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $house->postal_code) }}">
            @error('postal_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="image">CAMBIA IMMAGINE</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
             @enderror
             @if ($house->image)

            <img class="m-3" width="150" src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->image_original_name }}">
        
            @endif  
        </div>

        <div class="row mt-5 mb-5">
            <h2>Servizi:</h2>
            <div class="form-check">
              @foreach ($services as $service)
                <span class="d-inline-block mr-3">
                    <input type="checkbox" name="services[]" id="service{{ $loop->iteration }}"
                    value="{{ $service->id }}"
                    @if ($errors->any() && in_array($service->id,old('services',[])))
                        checked
                    @elseif (!$errors->any() && $house->services->contains($service->id))
                        checked
                    @endif
                    >
                    <label for="service{{ $loop->iteration }}"> {{ $service->name }} </label>
                </span>
              @endforeach
              @error('services')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        

        <div class="mt-2">
            <button class="btn btn-primary" type="submit">Aggiorna</button>
        </div>

    </form>

    <a class="mt-2 btn btn-dark m-2" href="http://localhost:8000/house">Visualizza risultato finale</a><br>
    
    <a class="mt-2 btn btn-dark m-2" href="{{route('user.house.show', $house)}}">Ritorna</a>
    
    <form action="{{ route('user.house.destroy', $house) }}" method="POST">
         @csrf
         @method('DELETE')
         <button type="submit" class="btn btn-danger m-2">ELIMINA</button>
    </form>
</div>  
@endsection