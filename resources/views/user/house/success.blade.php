@extends('layouts.app')

@section('content')
<div class="container">
    
    <div id="page-success" role="alert">
        <div class="alert alert-success" >
            L'acquisto è stato effettuato con successo.
        </div>
        <a href="{{ route('user.home') }}" class="m-2 btn btn-dark">Torna alla Home</a>
      </div>

</div>

@endsection