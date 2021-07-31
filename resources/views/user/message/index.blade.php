@extends('layouts.app')

@section('content')
<div class="container list-messagi offset-md-3 col-md-6 col-xs-12">
    <h4>{{-- {{ Auth::user()->name }} --}}Ecco i tuoi Messaggi:</h4>

    @foreach ($messages as $message)
    <h5>CASA: {{ $message->house_id }}</h4>
    <div>
        <ul class="info">
            <li>
                <p>{{ $message->title }}</p>
            </li>
            <li>
                <p>{{ $message->mail }}</p>  
            </li>
            <li>
                {{-- <p>{{ $message->content }}</p> --}}
                <a href="{{ route('user.message.show', $id ='0') }}">Apri</a>
            </li>

        </ul>
    </div>
    @endforeach 
</div>
@endsection