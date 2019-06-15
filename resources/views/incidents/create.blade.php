@extends('layouts/app')

@section('pageTitle', 'New Incident')

@section('content')
  <div class="container float-center add-form">
    <div class="container header">
      <a class="float-right fas fa-plus-square fa-3x" href="./create" style="text-decoration: none;"></a>

      <h1>New Incident Information</h1>

      {!! Form::open(['action' => 'IncidentsController@store', 'method' => 'POST']) !!}
        @csrf
        <fieldset>
          <div class="form-group">
            <label name="category"> <strong>Category*</strong> <small>(required)</small> </label><br>
            <select class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="inlineFormCategory" aria-haspopup="true" aria-expanded="false" name="cat_id" required>
              <option value="" selected>Choose...</option>
              @foreach ($categories as $cat)
                  <option value={{$cat->id}}>{{$cat->description}}</option>
              @endforeach
            </select>
          </div>

          <hr>

          <strong>Incident ID</strong> <small>(assigned on save)</small>

          <hr>

          <div class="form-group date">
            <label name="incident_date"> <strong>Date*</strong> <small>(required)</small> </label>
            <input id="incident_date" name="incident_date" type="date" class="form-control{{ $errors->has('incident_date') ? ' is-invalid' : '' }}" value="{{ old('incident_date') }}" placeholder="mm/dd/yyyy" required>

            @if ($errors->has('incident_date'))
              <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('incident_date') }}</strong>
              </span>
            @endif
          </div>

          <br>

          <div class="form-group">
            <label name="description"> <strong>Description*</strong> <small>(required)</small> </label>
            <textarea id="ckeditor1" name="description" class="form-control" rows="5" type="text" placeholder="Describe the incident" required></textarea>
          </div>

          <div class="float-right save-cancel-btn">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a class="btn btn-success" href="/incidents">My Incidents</a>
            <a class="btn btn-default" href="/main">Cancel</a> <!-- Returns to main page -->
          </div>
        </fieldset>
      {!! Form::close() !!}
    </div>
  </div>
@stop
