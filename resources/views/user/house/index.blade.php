@extends('layouts.app')

@section('content')

    <div class="index-container container bg-light">

        @if (@session('deleted'))
            <strong>
                <h4 style="color: red">
                    L'elemento è stato eliminato correttamente
                </h4>
            </strong>
        @endif

        <h3>Ecco tutte le tue case:</h3>
        
        <table class="table">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Titolo</th>
                    <th>Servizi</th>
                    <th>Città</th>
                    <th>Paese</th>
                    <th colspan="3">Opzioni</th>
                </tr>

            </thead>

            <tbody>

                @foreach ($houses as $house)
                <tr>
                    <td>id:{{ $house->id }}</td>
                    <td>{{ $house->title }}</td>
                    <td>
                    @foreach ($house->services as $service)
                    <div>{{ $service->name }}</div>
                    @endforeach</td>
                    <td>{{ $house->city }}</td>
                    <td>{{ $house->country }}</td>
                    <td>
                        <a class="button" href="{{ route('user.house.show', $house) }}">
                            DETTAGLI
                        </a>
                    </td>
                    <td>
                        <a class="button" href="{{ route('user.house.edit', $house) }}">
                            Modifica
                        </a>
                    </td>
                    <td>
                        <a class="button" href="{{ route('user.sponsor') }}">
                            Sponsorizza
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

@endsection