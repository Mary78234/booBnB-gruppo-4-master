@extends('layouts.app')

@section('content')
<div class="container">
    <p>{{ Auth::user()->name }}</p>
    <h1>Visualizza tutti i messaggi</h1>
    @foreach ($messages as $message)
    <h2>CASA: {{ $message->house_id }}</h2>
    <ul>
       <li>
           <h3>{{ $message->title }}</h3>
           <p>{{ $message->created_at }}</p>
           <p>{{ $message->content }}</p>
       </li>
    </ul>
    @endforeach 
    <a href="{{ route('user.message.show', $id ='0') }}">Vedi messaggio</a> 
</div>
@endsection