@extends('layouts.app')

@section('content')
<div class="container">
<div class="card mt-4 motori">
    <div class="card-header">
      Broj šasije: &nbsp<strong> {{ $motor->broj_sasije }}</strong><br>
      Naziv: &nbsp {{ $motor->naziv }}  <a class="btn btn-warning btn-sm float-right" href="/home">Natrag</a>
    </div>

    kreiraj novi servis
</div>
</div>
@endsection
