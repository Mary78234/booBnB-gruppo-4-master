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
    

    <form class="bg-light" action="{{route('user.house.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        {{-- <div class="mb-4">
            <label for="visibility">Visibile</label>
            <select class="form-control @error('visibility') is-invalid @enderror" name="visibility" id="visibility">
    
                <option value="1">Si</option>
                
                <option value="0">no</option>
    
            </select>
        </div> --}}
        
        <div>
        <p>Visibile</p>
        <input type="radio" id="visibility" name="visibility" value="1" checked>
        <label for="visibility">Si</label>
        <input type="radio" id="visibility" name="visibility" value="0")>
        <label for="visibility">No</label>   
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">TITOLO</label>
            <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        {{-- poi da sostituire --}}
        <div class="mt-2">
            <label class="label-control" for="image">INSERISCI IMMAGINE</label>
            <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">
            @error('image')
            <div class="text-danger">{{ $message }}</div>
             @enderror
        </div>

        <div class="mt-2">
            <label class="label-control" for="title">Descrizione</label>
            <textarea type="text" id="description" name="description" class="form-control" rows="3">{{old('description')}}</textarea>
        </div>

        <div class="mt-2">
            <label class="label-control" for="rooms_number">NUMERO DI STANZE:</label>
            <input type="number" onKeyPress="if(this.value.length==3) return false;" id="rooms_number" name="rooms_number" class="form-control @error('rooms_number') is-invalid @enderror" value="{{ old('rooms_number') }}">
            @error('rooms_number')
            <div class="text-danger">{{ $message }}</div>
           @enderror
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
            <input type="text"  return false;  id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
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
            <input  type="number" onKeyPress="if(this.value.length==5) return false;" id="postal_code" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code') }}">
            @error('postal_code')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="row mt-5 mb-5">
            <h2>Servizi:</h2>
            <div class="form-check">
              @foreach ($services as $service)
                <span class="d-inline-block mr-3">
                    <input type="checkbox" name="services[]" id="service{{ $loop->iteration }}"
                    value="{{ $service->id }}"
                    @if (in_array($service->id,old('services',[])))
                    checked
                    @endif>
                    <label for="service{{ $loop->iteration }}"> {{ $service->name }} </label>
                </span>
              @endforeach
              @error('services')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            </div>


        <div class="mt-2">
            <button class="btn btn-primary" type="submit">INSERISCI</button>
            <button class="btn btn-danger" type="reset">RESET</button>
        </div>


    </form>

</div>
<script>




</script>


@endsection