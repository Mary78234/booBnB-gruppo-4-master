@extends('layouts.app')

@section('content')
<div id="sponsor-container" class="container">
    
    <h1 id="sponsor-title">Scegli la sponsorizzazione che fa per te:</h1><br>


 
    <form  action="{{route('user.sponsor.store')}}" method="post">
        @csrf
        @method('POST')
        <input type="hidden" value="{{ $house->id }}" name="house_id">    
    @foreach ($sponsors as $sponsor)
        
       <div id="sponsor" class="form-check">
            <div>
            <label class="label-control" for="sponsor{{ $loop->iteration }}">

                <h1>{{$sponsor->name}}</h1>
                 <p>{{$sponsor->description}}</p>
                 <p>Euro: {{$sponsor->price}}</p>
       

            </label>
            </div>
            <input class="form-check-input" 

                type="radio" 
                name="sponsor" 
                id="sponsor{{ $loop->iteration }}" 
                value="{{ $sponsor->id }}"
                checked> 
                
            
        </div>
        @endforeach 
        <div class="button-div">
            <button id="sponsor-button" type="submit" class="btn btn-primary m-5" value="SUBMIT">Acquista</button>
        </div>
    
        
    </form>
    



</div>

@endsection