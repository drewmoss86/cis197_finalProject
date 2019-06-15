@extends('layouts.app')

<!-- Custom styling for main page -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Main Menu</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">

@section('content')
  <div class="container">
    <div class="row justify-content-center">
    <div class="container header">
      @include('includes/message')

    <div class="jumbotron col-md-12" style="background-color: #212529;">
      {{-- <div class="container"> --}}
        <h1 class="display-2">CIMT</h1>
        <hr class="my-4">
        <div class="container user_icon">
          <img src="/storage/img/{{Auth::user()->user_icon}}" height="128" width="128">
            <div class="container user_contact">
            <h1 class="display-5 user_name">{{Auth::user()->name}} </h1>
            {{-- if admin has no value, then the logged-in user is not an admin --}}
            @if (!empty(Auth::user()->admin))
              Admin
              <p class="lead">{{ Auth::user()->admin->email }}</p>
            {{-- if cimtUser has no value, then the logged-in user is not an Cimt User --}}
            @elseif (!empty(Auth::user()->cimtUser))
              Cimt User
              <p class="lead">{{ Auth::user()->cimtUser->phone }}</p>
            {{-- if resourceProvider has no value, then the logged-in user is not an Resource Provider --}}
            @elseif (!empty(Auth::user()->resourceProvider))
              Resource Provider
              <p class="lead">{{ Auth::user()->resourceProvider->address }}</p>
            @endif
          </div>
        </div>
        {{-- <div class="credits">
          Icons made by <a href="https://www.flaticon.com/authors/darius-dan"
          title="Darius Dan">Darius Dan</a><br> from <a href="https://www.flaticon.com/"
          title="Flaticon">www.flaticon.com</a> <br> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/"
          title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a>
        </div> --}}
    </div>


    {{-- <div class="col-md-12 mainMenu">
    <h1 class="mt-5 display-5 ">Main Menu </h1>
      <ul class="list-group list-group-flush">
        <a class="nav-link list-group-item list-group-item-info" href="/resources/create"><li>Add Available Resource</li></a>
        <a class="nav-link list-group-item list-group-item-info" href="/incidents/create"><li>Add Emergency Incident</li></a>
        <a class="nav-link list-group-item list-group-item-info" href="/resources/search"><li>Search Resources</li></a>
        <a class="nav-link list-group-item list-group-item-info" href="/resources/report"><li>Generate Resource Report</li></a>
      </ul>
    </div> --}}

    {{-- <a class="col-md-5" href="{{ url('logout')}}"><button class="btn btn-lg btn-secondary btn-block mt-5 mb-5 exit" type="submit" >Exit</button></a> --}}
    </div>
    </div>
  </div>
@endsection
