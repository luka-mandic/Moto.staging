@extends('layouts.app')

@section('content')
<div class="container">
  <form action="{{ action('MotorController@search') }}" method="POST">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="search">Traži:</label>
      <input type="text" name="search" class="form-control" autofocus>
    </div>

    <div class="form-group">
      <button type="submit" class="btn btn-primary">Pretraga</button>
    </div>
  </form>
    
<div class="card mt-4 motori">
    <div class="card-header">Dashboard<br><br>

      <a href="/home/create" class="btn btn-primary btn-sm" style="color: white">Dodaj novi</a>
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
                <th scope="row"><a class="motor" href="/home/{{ $motor->id }}">{{ $motor->broj_sasije }}</a></th>
                <td><a href="/home/{{ $motor->id }}" class="motor">{{ $motor->naziv }}</a></td>
                <td>{{ $motor->created_at->format('d.m.Y / h:m:s') }}

                  <form id="deleteForm" action="{{ action('MotorController@destroy', $motor->id) }}" style="display: none" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    
                  </form>
                  
                  <a href="{{ action('MotorController@destroy', $motor->id) }}" onclick="event.preventDefault(); deleteMotor()" class="btn btn-danger btn-sm float-right" >Delete</a>
  
                  <a href="/home/{{ $motor->id }}/edit" class="btn btn-warning btn-sm float-right mr-3" >Edit</a></td>
      
              </tr>

            @endforeach
        </tbody>
        </table>
        {{ $motori->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  function deleteMotor()
  {
    if(confirm("Jeste li sigurni da želite izbrisati motor i njegove povezane servise?"))
      {
        document.getElementById('deleteForm').submit();
      }
  }
  

</script>
@endsection
