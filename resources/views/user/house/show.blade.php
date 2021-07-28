@extends('layouts.app')

@section('content')
<div class="container col-xs-12 offset-md-2 col-md-8">
    
    <h1 class="text-center mb-4">Dettagli: {{ $house->title }}</h1>
    <div class="offset-xs-4 col-xs-4">
        @if ($house->image)
            <div class="img-area text-center mb-5" style="width:80%; margin:0 auto; ">
                <img style="width: 100%;" src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->image_original_name }}">
            </div>
            
        
        @endif   
    </div>
    
    <div class="row mb-5">
        <div class="col-xs-12 offset-lg-1 col-lg-5">
            <h2>Caratteristiche:</h2>
        <ul class="text-left" style="list-style-type: none; padding: 0;">
            <li>Numero di stanze: {{ $house->rooms_number }}</li>
            <li>Numero letti: {{ $house->beds }}</li>
            <li>Bagni: {{ $house->bathrooms }}</li>
            <li>Dimensione: {{ $house->square_metre }} metri quadri</li>
            
            {{-- <li>Latitudine: {{ $house->lat }}</li>
            <li>Longitudine: {{ $house->long }}</li> --}}
            @if ($house->visibility)
            <li>Visibile: SI</li>
            @else
            <li>Visibile: NO</li>  
            @endif
    
        </ul>
        </div>

        <div class="col-xs-12 offset-lg-1 col-lg-5">
            <h2>Indirizzo:</h2>
            <ul style="list-style-type: none; padding: 0;">
                <li>{{ $house->address }} {{ $house->house_number }}</li>
                <li>{{ $house->postal_code }}</li>
                <li>{{ $house->city }}</li>
                <li>{{ $house->region }}</li>
                <li>{{ $house->country }}</li>
                
            </ul>
        </div>
    
        
    </div>
    
   {{--  @if ($house->services === '')
        <div>Non ci sono servizi</div>
    @else --}}
        <div class="col-xs-12 text-center mb-5">
            <h2>Servizi:</h2>
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($house->services as $service)
                    <li class="mr-3" style=" display: inline;">{{ $service->name }}</li>
                @endforeach
            </ul>
        </div> 
   {{--  @endif --}}
    
    
    <h2 class="text-center mb-3">Posizione:</h2>
    {{-------------------------MAPPA----------------------}}
    <div class="mb-5" style="width:100%; height: 75vh;" id='map-div'></div>
    {{-------------------------MAPPA----------------------}}


    <div class="text-center mb-5">
        <a class="btn btn-primary" href="{{ route('user.house.edit', $house) }}">Modifica</a>
        <a class="btn btn-info">Visualizza</a>
        <a class="btn btn-success">Sponsorizza</a>
    </div>
    {{-- SEZIONE MESSAGGI DA TERMINARE --}}
    <h1 class="text-center">Lista Messaggi:</h1>
    <ul style="list-style-type: none; padding: 0;">
        @foreach ($messages as $message)
            <li>
                <h5 class="text-center">{{ $message->title }}</h5>
                <p>{{ $message->content }}</p>
            </li>
        @endforeach
    </ul>
  
</div>
{{-------------------------MAPPA----------------------}}
<script>
    const API_KEY = 'D0clxQHiIegbNyytBXsP3gAAyepp7VkR';
        const APPLICATION_NAME = 'My Application';
        const APPLICATION_VERSION = '1.0';

        const geometry = [
                <?php echo $house->long ?>,
                <?php echo $house->lat ?>
            ]
        
        
        tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION);

        const myposition = {lng: <?php echo $house->long ?>, lat: <?php echo $house->lat ?>};

        var map = tt.map({
        key: API_KEY,
        container: 'map-div',
        center: myposition,
        zoom: 16
        });

         const houseNumber = '<?php echo $house->house_number ?>';
         const title = '<?php echo $house->title ?>';
         const city = '<?php echo $house->city ?>';
         console.log(city)
         const address = '<?php echo $house->address ?>';
         const pos = geometry;
         let cityStoresList = document.getElementById(city);
         const marker = new tt.Marker().setLngLat(pos).setPopup(new tt.Popup({offset: 35}).setHTML(title + '<br>' + city + ' ' + address + ' ' + houseNumber)).addTo(map);


</script> 


@endsection

