@extends('layouts.app')

@section('content')
<div class="container" style="color:black">
    <div class="form-container col-xs-12 offset-md-3 col-md-6">
        <h1>Registrati</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label for="name">
                    {{ __('Name') }}
                </label>
                <input  id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>
            </div>

            <div class="form-group">
                <label for="surname">
                    {{ __('Surname') }}
                </label>
                <input  id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>
            </div>

            <div class="form-group">
                <label for="date_of_birth">
                    {{ __('Date of Birth') }}
                </label>
                <input  id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}" autocomplete="date" autofocus>
            </div>

            <div class="form-group">
                <label for="email">
                    {{ __('E-Mail Address') }}
                </label>
                <input  id="email" type="email" class="form-control"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                
            </div>

            <div class="form-group">
                
                    <button class="btn btn-primary" type="submit">
                        {{ __('Register') }}
                    </button>
                
            </div>
            

           
        </form>
    </div>
</div>
@endsection
