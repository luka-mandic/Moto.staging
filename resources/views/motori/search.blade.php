@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ action('MotorController@search') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="search">Traži:</label>
      <input type="text" name="search" class="form-control">
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Pretraga</button>
    </div>
  </form>
    
<div class="card mt-4 motori">
    <div class="card-header">Rezultati pretrage "{{ $pretraga }}"  <a class="btn btn-warning btn-sm float-right" href="/servisi">Natrag</a>
    </div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <table class="table table-striped">
            
        <thead>
        <tr>
          <th scope="col">Broj šasije</th>
          <th scope="col">Naziv motora</th>
          <th scope="col">Datum</th>
        </tr>
      </thead>
        <tbody>
            @foreach($motori as $motor)

              <tr>
                <th scope="row"><a class="motor" href="/servisi/{{ $motor->id }}">{{ $motor->broj_sasije }}</a></th>
                <td><a class="motor" href="/servisi/{{ $motor->id }}">{{ $motor->naziv }}</a></td>
                <td>{{ $motor->created_at->format('d.m.Y / h:m:s') }}</td>
              </tr>

            @endforeach
        </tbody>
        </table>
    </div>
</div>
</div>
@endsection
