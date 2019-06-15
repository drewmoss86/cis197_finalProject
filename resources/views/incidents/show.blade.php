@extends('layouts/app')

@section('content')
  <div class="container float-center">
    <div class="container header">
      <a href="/incidents" class="btn btn-primary go-back">Go back</a>

      <hr>

      <h1>Incident #{{$i->id}}</h1>
      
      <br><br>

      <div class="card">
        <strong>Category:</strong>
        {{$prev_cat}}   
        <br><br>
        <strong>Incident Date:</strong>
        {!! date('M j, Y', strtotime($i->incident_date)) !!}
        <br><br>
        <strong>Description:</strong>
        {!! $i->description !!}
      </div>

      {{-- if not a guest, then allow delete functionality --}}
      @if(!Auth::guest())
        <div class="float-right edit-delete-buttons">
          <a href="/incidents/{{$i->id}}/edit" class="btn btn-primary" id="custom-buttons">Edit</a>
          
          {!! Form::open(['action' => ['IncidentsController@destroy', $i->id], 'method' => 'POST', 'class' => 'float-left delete-button']) !!}
            @csrf
            {!! Form::hidden('_method', 'DELETE') !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'id' => 'custom-buttons']) !!}
          {!! Form::close() !!}
        </div>
      @endif
    </div>
  </div>
@endsection