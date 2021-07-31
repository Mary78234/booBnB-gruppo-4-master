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

        <h1 class="title text-uppercase">Le case inserite</h1>
        
        <table class="table">

            <thead>

                <tr>
                    <th>Nome casa</th>
                    <th class="text-center">Visibilità</th>
                    <th>Indirizzo</th>
                    <th colspan="3"></th>
                </tr>

            </thead>

            <tbody>

                @foreach ($houses as $house)
                <tr>
                    <td>{{ $house->title }}</td>
                    {{-- <td>
                        @foreach ($house->services as $service)
                        <div>{{ $service->name }}</div>
                        @endforeach
                    </td> --}}
                    @if ($house->visibility)
                        <td class="text-center">Si</td>
                    @else
                        <td class="text-center">No</td>
                    @endif
                    <td>{{ $house->address }}, {{$house->house_number}} - {{$house->city}} - {{$house->postal_code}} </td>
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