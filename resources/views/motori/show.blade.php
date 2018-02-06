@extends('layouts.app')

@section('content')
<div class="container">
<div class="card mt-4 motori">
    <div class="card-header">
      Broj šasije: &nbsp<strong> {{ $motor->broj_sasije }}</strong><br>
      Naziv: &nbsp {{ $motor->naziv }}  <a class="btn btn-secondary btn-sm float-right" style="color: white" href="/servisi">Natrag</a>
    </div>

    <div class="card-body">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Opis posla</th>
            <th scope="col" style="min-width: 13vw">Datum</th>
          </tr>
        </thead>
      @foreach($servisi as $servis)

        <tr>
          <td id="td{{ $servis->id }}">{{ $servis->opis }}</td>
          <td>{{ $servis->created_at->format('d.m.Y / h:m:s') }}
          <form id="deleteServis{{ $servis->id }}" action="{{ action('ServisController@destroy', $servis->id) }}" style="display: none" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            
          </form>
          
          <a href="{{ action('ServisController@destroy', $servis->id) }}" onclick="event.preventDefault(); deleteServis(this.id)" class="btn btn-danger btn-sm float-right" id="{{ $servis->id }}">Izbriši</a>
          
          <a href="" data-id="{{ $servis->id }}" class="btn btn-warning btn-sm float-right mr-3 editServis">Izmijeni</a></td>
          </td>
        </tr>

      @endforeach
      <tr>
        <form action="/servisi/{{ $motor->id }}/servis" method="POST">
          {{ csrf_field() }}
          <input type="hidden" value="{{ $motor->id }}" name="motor_id">
          <td>
            <textarea class="form-control" name="opis" required></textarea>
          </td>
          <td>
            <button type="submit" class="btn btn-primary">Dodaj</button>
          </td>
        </form>
      </tr>
      </table>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
  function deleteServis(clicked_id)
  {
    if(confirm("Jeste li sigurni da želite izbrisati servis"))
      {
        document.getElementById('deleteServis'+clicked_id).submit();
      }
  }
  
  $(".editServis").on('click', function(event){

   event.preventDefault();
   var tdId = $(this).data("id");
   servisValue = $("#td"+tdId).text();


   $("#td"+tdId).html(`<form action="/servisi/servis/`+tdId+`" method="POST">
          {{ csrf_field() }}
          {{ method_field('PUT') }}
          <input type="hidden" value="{{ $motor->id }}" name="motor_id">
          <div class="form-group">
            <textarea class="form-control" name="opis" required>`+servisValue+`</textarea>
          </div>
          <td>
            <button type="submit" class="btn btn-primary">Izmijeni</button> <button type="button" onclick="$('#td`+tdId+`').text('`+servisValue+`')" class="btn btn-danger">Odustani</button>
          </td>
        </form>`);



  });

</script>
@endsection