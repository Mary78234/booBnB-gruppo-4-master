@extends('layouts.app')

@section('content')

    <div class="divider">
        <div class="login-animation">
            {{ __('Benvenuto! Questa è la dashboard.') }}
        </div>
    </div>

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
            {{-- <div class="dashboard-item sponsor">
                <a href="{{ route('user.sponsor') }}">
                    Sponsorizza
                </a>
            </div> --}}
        </section>
    </div>

    <div class="divider">

    </div>

@endsection
