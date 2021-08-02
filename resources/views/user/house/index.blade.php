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
            
        <div class="row lista_wq">
            <div></div>
        </div>

        <div class="row table_small">
            @foreach ($houses as $house)
            <ul>
                <li class="li_wq">{{ $house->title }}</li>
                <li class="li_wq">
                    @if ($house->visibility)
                        <div>Visible</div>
                    @else
                        <div>Non Visibile</div>
                    @endif
                </li>
                <li class="li_wq">{{ $house->address }}, {{$house->house_number}} - {{$house->city}} - {{$house->postal_code}}</li>
                <li>
                    <a class="button btn_wq" href="{{ route('user.house.show', $house) }}">DETTAGLI</a>
                    <a class="button btn_wq" href="{{ route('user.house.edit', $house) }}">Modifica</a>
                    <a class="button btn_wq" href="{{ route('user.sponsor', $house) }}">Sponsorizza</a>
                </li>
            </ul>
            @endforeach
        </div>


        <table class="table table_large">

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
                        <a class="button" href="{{ route('user.sponsor', $house) }}">
                            Sponsorizza
                        </a>
                    </td>
                    
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

@endsection