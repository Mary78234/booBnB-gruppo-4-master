@extends('layouts.app')

@section('content')
<div class="container">

    @if (@session('deleted'))
        <strong><h4 style="color: red">L'elemento è stato eliminato correttamente</h4></strong>
    @endif

    <H1>Ecco tutte le tue case:</H1>
    
    {{-- <ul>
        <li>
            <p>casa</p><br>
            <a href="http://localhost:8000/house">Visualizza come guest</a><br>
            <a href="{{ route('user.house.show', $id ='0') }}">Vedi casa</a> <br>
            <a href="{{ route('user.house.edit', $id ='0') }}">Gestisci(edit)</a> <br>
            <a href="{{ route('user.sponsor') }}">sponsorizza</a>
        </li>
    </ul> --}}
    <table class="table bg-light">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Country</th>
            <th>City</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($houses as $house)
            <tr>
                <td>id:{{ $house->id }}</td>
                <th>{{ $house->title }}</th>
                <th>{{ $house->description }}</th>
                <th>{{ $house->country }}</th>
                <th>{{ $house->city }}</th>
                <th><a class="btn btn-dark" href="{{ route('user.house.show', $house) }}">DETTAGLI</a></th>
                <th><a class="btn btn-dark" href="{{ route('user.house.edit', $house) }}">Modifica</a></th>
                <th><a class="btn btn-dark" href="{{ route('user.sponsor') }}">Sponsorizza</a></th>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection