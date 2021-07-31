@extends('layouts.app')

@section('content')
<div class="house_container container col-xs-12 offset-md-2 col-md-8">
    <div class="row">
    
        <h1 class="title col-12">{{ $house->title }}</h1>
        <div class="image col-md-12 col-lg-6">
            @if ($house->image === null)
                <div class="img-area" style="background-image: url('{{ asset('storage/placeholder/house.svg') }}')">
                </div> 
            @else

                <div class="img-area" style="background-image: url('{{ asset('storage/' . $house->image) }}')">
                    <!-- <img src="{{ asset('storage/' . $house->image) }}" alt="{{ $house->image_original_name }}" class="img-fluid"> -->
                </div>
                
            @endif   
        </div>
    
    
        <div class="details col-sm-12 col-md-6 col-lg-3">
            <h3>Dettagli</h3>
            <ul class="text-left">
                <li>Stanze: {{ $house->rooms_number }}</li>
                <li>Letti: {{ $house->beds }}</li>
                <li>Bagni: {{ $house->bathrooms }}</li>
                <li>Superficie: {{ $house->square_metre }}mq</li>
                @if ($house->visibility)
                <li>Visibile</li>
                @else
                <li>NON Visibile</li>  
                @endif
            </ul>
        </div>

        @if (count($house->services) === 0)
        <div class="col-sm-12 col-md-6 col-lg-3">
            <h2>Non ci sono servizi</h2>  
        </div> 
        @else
        <div class="col-sm-12 col-md-6 col-lg-3">
            <h2>Servizi</h2>
            <ul>
                @foreach ($house->services as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
        </div> 
        @endif

        <!-- <div class="col-sm-12 col-md-6 col-lg-3">
            <h3>Indirizzo</h3>
            <ul>
                <li>{{ $house->address }} {{ $house->house_number }}</li>
                <li>{{ $house->city }} - {{ $house->postal_code }}</li>
                <li>{{ $house->region }}</li>
                <li>{{ $house->country }}</li>
            </ul>
        </div> -->

    
        
    </div>
    
    <div class="address col-12">
        <h2>Indirizzo</h2>
        <h5>{{ $house->address }} {{ $house->house_number }}, {{ $house->city }} - {{ $house->postal_code }} ({{ $house->country }})</h5>
    </div>
    <!-- -------------------------MAPPA---------------------- -->
    <div class="mb-5" style="width:100%; height: 75vh;" id='map-div'></div>
    <!-- -------------------------MAPPA---------------------- -->


    <div class="buttons col-12">
        <a class="button" href="{{ route('user.house.edit', $house) }}">Modifica</a>
        <a class="button" href="/house">Visualizza</a>
        <a class="button">Sponsorizza</a>
    </div>

    {{-- SEZIONE MESSAGGI DA TERMINARE --}}
    <div class="mb-5 messagi-house">
        @if (count($messages) === 0)
        <div class="col-xs-12 text-center mb-5">
            <h2>Non ci sono messaggi.</h2>  
        </div> 
        @else
            <div class="col-xs-12 mb-5 messagi-casa">
                <h2>Messaggi:</h2>
                <ul style="list-style-type: none; padding: 0;">
                    @foreach ($messages as $message)
                        <li>
                            <h5 class="text-center">{{ $message->title }}</h5>
                            <h5>Enviato da {{$message->mail}}</h5>
                            <p>{{ $message->content }}</p>
                        </li>
                    @endforeach
                </ul>
            </div> 
        @endif

    </div>

    {{-- /SEZIONE MESSAGGI DA TERMINARE --}}

        
  
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

