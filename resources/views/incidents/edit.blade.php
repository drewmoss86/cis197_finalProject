@extends('layouts/app')

@section('pageTitle', 'Edit Incident')

@section('content')
  <div class="container float-center add-form">
    <div class="container header">
      <!-- Add button -->
      <a class="float-right fas fa-plus-square fa-3x" href="./edit"></a>

      <h1>Edit Incident Information</h1>

      {!! Form::open(['action' => ['IncidentsController@update', $i->id], 'method' => 'POST']) !!}
        @csrf
        <br>
        <fieldset>
          <div class="form-group">
            <label name="cat_id"> <strong>Category*</strong> <small>(required)</small> </label>
            <select class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropDownCat" aria-haspopup="true" aria-expanded="false" name="cat_id" required>
            <option id=selectedCat value={{$i->cat_id}} selected>{{$prev_cat}}</option>
              @foreach ($categories as $cat)
                <option id="cat" data-sec-val={{$cat->id}} value={{$cat->id}}>{{$cat->description}}</option>
              @endforeach
            </select>
          </div>

          <br><hr>

          <strong>Incident ID</strong> <small>(assigned on save)</small>

          <hr><br>

          <div class="form-group date">
            <label name="incident_date"> <strong>Date*</strong> <small>(required)</small> </label>
            <input id="incident_date" name="incident_date" type="date" class="form-control{{ $errors->has('incident_date') ? ' is-invalid' : '' }}" value="{{ $i->incident_date }}" placeholder="mm/dd/yyyy" required>

            @if ($errors->has('incident_date'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('incident_date') }}</strong>
              </span>
            @endif
          </div>

          <br>

          <div class="form-group">
            <label name="description"> <strong>Description*</strong> <small>(required)</small>  </label>
            <textarea id="ckeditor1" name="description" class="form-control" rows="5" type="text" placeholder="Describe the incident" required>{{$i->description}}</textarea>
          </div>

          <div class="float-right">
            {!! Form::hidden('_method', 'PUT') !!}
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-default" href="/incidents/{{$i->id}}">Cancel</a> <!-- Cancel returns to main page -->
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
@endsection
