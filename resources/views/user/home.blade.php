@extends('layouts.app')
        {{-- DASHBOARD - MAIN --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><a class="dashboard" href="#">{{ __('Dashboard') }}</a></div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <span class="login-animation">{{ __('You are logged in!') }}</span>
                    <span class="welcome-animation">Welcome to BoolBnB </span>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="user-options">
                        <ul>
                            <li>
                                <a href="{{ route('user.house.create') }}">Inserisci Casa</a>
                            </li>
                            <li>
                                <a  href="{{ route('user.house.index') }}">Visualizza Case</a>
                            </li>
                            <li>
                                <a href="{{ route('user.message.index') }}">Vedi Messaggi</a>
                            </li>
                            <li>
                                <a href="{{ route('user.sponsor') }}">Sponsor</a>
                            </li>
                            
                        </ul>
                    </div>

                </div>  
                
            </div>
        </div>
    </div>

</div>
@endsection
