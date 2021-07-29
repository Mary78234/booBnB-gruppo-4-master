@extends('layouts.app')

@section('content')
<div class="container bg-light">
    
    <h1>DETTAGLI CASA: {{ $house->title }}</h1>
    
    <div>
        @if ($house->image)

            <img src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->image_original_name }}">
        
        @endif        
    </div>
    <h2 class="mt-4">Descrizione</h2>
    <p class="mt-2">{{ $house->description }}</p>

    <h2>Caratteristiche:</h2>
    <ul>
        <li>Numero di stanze: {{ $house->rooms_number }}</li>
        <li>Numero letti: {{ $house->beds }}</li>
        <li>Bagni: {{ $house->bathrooms }}</li>
        <li>Dimensione: {{ $house->square_metre }} metri quadri</li>
        <li>Nazione: {{ $house->country }}</li>
        <li>Regione: {{ $house->region }}</li>
        <li>Città: {{ $house->city }}</li>
        <li>Indirizzo: {{ $house->address }} {{ $house->house_number }}</li>
        <li>Codice Postale: {{ $house->postal_code }}</li>
        <li>Latitudine: {{ $house->lat }}</li>
        <li>Longitudine: {{ $house->long }}</li>
        @if ($house->visibility)
        <li>Visibile: SI</li>
        @else
        <li>Visibile: NO</li>  
        @endif

    </ul>
    <h3>Servizi:</h3>
    <ul>
        @foreach ($house->services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
    </ul>
    <h3>MAPPA</h3>
    {{-------------------------MAPPA----------------------}}
    <div style="width:75%; height: 75vh; margin: 0 auto;" id='map-div'></div>
    {{-------------------------MAPPA----------------------}}


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

