@extends('layouts/app')

@section('pageTitle', 'Incidents')

@section('content')
  <div class="container float-center">
    <div class="container header">
      @include('includes/message')
      <a class="float-right fas fa-plus-square fa-3x" href="incidents/create"></a>

      <h1>Incidents</h1>

      <br><br>

      @if(count($incidents) > 0)
        @foreach($incidents as $i)
          <div class="card card-body bg-light">
            <div class="row">
              <div class="col-md-8 col-sm-8">
                <h3 class="card-title"> <a href="/incidents/{{$i->id}}">Incident #{{$i->id}}</a> </h3>
                <small>Reported on {{ date("M j, Y", strtotime($i->incident_date)) }}</small>
              </div>
            </div>
          </div>
          <br>
        @endforeach

        {{$incidents->links()}}

      @else
        "No incidents found!"
      @endif
    </div>
  </div>
@endsection
