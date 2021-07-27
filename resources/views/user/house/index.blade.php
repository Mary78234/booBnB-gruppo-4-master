@extends('layouts.app')

@section('content')
<div class="container bg-light">

    @if (@session('deleted'))
        <strong><h4 style="color: red">L'elemento è stato eliminato correttamente</h4></strong>
    @endif

    <H1>Ecco tutte le tue case:</H1>
    
    <table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Titolo</th>
            <th>Servizi</th>
            <th>Stato</th>
            <th>Città</th>
            <th>Opzioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($houses as $house)
            <tr>
                <td>id:{{ $house->id }}</td>
                <td>{{ $house->title }}</td>
                <td>@foreach ($house->services as $service)
                <span class="badge m-1 badge-dark">{{ $service->name }}</span>
                @endforeach</td>
                <td>{{ $house->country }}</td>
                <td>{{ $house->city }}</td>
                <td><a class="btn btn-dark" href="{{ route('user.house.show', $house) }}">DETTAGLI</a></td>
                <td><a class="btn btn-dark" href="{{ route('user.house.edit', $house) }}">Modifica</a></td>
                <td><a class="btn btn-dark" href="{{ route('user.sponsor') }}">Sponsorizza</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
</div>
@endsection