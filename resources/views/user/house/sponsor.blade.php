@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Scegli la sponsorizzazione che fa per te:</h1><br>


 
    <form action="{{route('user.sponsor.store')}}" method="post"  enctype="multipart/form-data">
        @csrf
        @method('POST')
        
    @foreach ($sponsors as $sponsor)
        
       <div class="form-check d-flex">

            <label class="label-control" for="sponsor{{ $loop->iteration }}">

                <h1>{{$sponsor->name}}</h1>
                 <p>{{$sponsor->description}}</p>
                 <p>Euro: {{$sponsor->price}}</p>

            </label>

            <input class="form-check-input" 
                type="radio" 
                name="sponsors[]" 
                id="sponsor{{ $loop->iteration }}" 
                value="{{ $sponsor->id }}"
                checked>         
                
        </div>
        @endforeach 

        <button type="submit" class="btn btn-primary" value="SUBMIT">Acquista</button>
        
    </form>
    

    <a href="{{ route('user.home') }}">Torna alla dashboard</a>

</div>

@endsection