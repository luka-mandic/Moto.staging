@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center mt-5">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Izmjena motora <a class="btn btn-warning btn-sm float-right" href="/servisi">Natrag</a></div>
        <div class="card-body">
          <form action="{{ action('MotorController@update', $motor->id) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <input type="hidden" name="motor_id" value="{{ $motor->id }}">

            <div class="form-group">
              <label for="broj_sasije">Broj šasije:</label>
              <input type="text" name="broj_sasije" class="form-control{{ $errors->has('broj_sasije') ? ' is-invalid' : ''}}" autofocus value="{{ old('broj_sasije', $motor->broj_sasije) }}">
            
              @if($errors->has('broj_sasije'))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first('broj_sasije') }}</strong>

                </div>
              @endif
            </div>

            <div class="form-group">
              <label for="naziv">Naziv motora:</label>
              <input type="text" name="naziv" class="form-control{{ $errors->has('naziv') ? ' is-invalid' : ''}}" value="{{ old('naziv', $motor->naziv) }}">
            
              @if($errors->has('naziv'))
                <div class="invalid-feedback">
                  <strong>{{ $errors->first('naziv') }}</strong>
                </div>
              @endif
            </div>

            <div class="form-group">
              <button class="btn btn-primary" type="submit">Spremi</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
