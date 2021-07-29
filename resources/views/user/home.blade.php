@extends('layouts.app')

@section('content')

{{-- <section class="jumbotron">
    <div class="container text-center">
        <h1>Qui inizia la tua avventura!</h1>
        <h5>Esperienze uniche in luoghi magnifici.</h5>
        <h5 class="mb-5">Entra nel magico mondo di BoolBnB.</h5>
        <router-link class="nav-link" :to="{name: 'advsearch'}">
            <span>Ricerca Avanzata</span>
        </router-link>
    </div>
</section> --}}

    <div class="dashboard-background">
        <section class="dashboard container">
            <div class="dashboard-item new-house">
                <a href="{{ route('user.house.create') }}">
                    Aggiungi casa
                </a>
            </div>
            <div class="dashboard-item see-houses">
                <a href="{{ route('user.house.index') }}">
                    Vedi case
                </a>
            </div>
            <div class="dashboard-item messages">
                <a href="{{ route('user.message.index') }}">
                    Messaggi
                </a>
            </div>
            <div class="dashboard-item sponsor">
                <a href="{{ route('user.sponsor') }}">
                    Sponsorizza
                </a>
            </div>
        </section>
    </div>

    <div class="divider">

    </div>

@endsection
