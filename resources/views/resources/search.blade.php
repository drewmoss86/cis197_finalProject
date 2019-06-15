@extends('layouts/app')

@section('pageTitle', 'Search Resources')

@section('content')
  <div class="container float-center">
    <div class="container header">
      @include('includes/message')
      <a class="float-right fas fa-plus-square fa-3x" href="./search" style="text-decoration: none;"></a>

      <h1>Search Resources</h1>

      {!! Form::open(['action' => 'ResourcesController@search', 'method' => 'POST']) !!}
        @csrf
        <br>

        <fieldset>
          <div class="form-group">
            <label name="keyword"> <strong>Enter keyword</strong> <small>(optional)</small> </label>
            <input name="keyword" class="form-control" type="text" placeholder="Keyword">
          </div>

          <br>

          <div class="form-group functions">
            <label name='pFunc'> <strong>Primary Function</strong> <small>(optional)</small> </label> <br>
            <select class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="primaryFunction" aria-haspopup="true" aria-expanded="false" name="pFunc">
              <option selected value="">Choose...</option>
              @foreach ($functions as $func)
                <option value={{$func->id}}> #{{$func->id}} {{$func->description}}</option>
              @endforeach
            </select>
          </div>

          <br>

          <div class="form-group distance">
            <label name="distance"> <strong>Distance from PCC</strong> <small>(optional)</small> </label>
            <div class="container distance-input">Within <input name="distance" class="form-control distance" type="text" style="width: 50%"> miles of PCC</div>
          </div>

          <div class="float-right div-search">
            {!! Form::submit('Search', ['id' => 'search', 'name' => 'search', 'class' => 'btn btn-primary search', 'style' => 'width: 100%']) !!}
            <a class="btn btn-default" href="/" style="width: 100%">Cancel</a> <!-- Returns to main page -->
          </div>
        </fieldset>
      {!! Form::close() !!}

      <hr>

      @if(isset($details))

        @if($details->count() > 0)

          <table class="table search-results">
            <p class="table search-results"> The results for your search of <br>
              <b>Keyword: </b> {{ $keyword }} <br>
              <b>Function: </b> {{ $pFunc['description'] }} <br>
              <b>Distance: </b> {{ $distance }} <br>
            </p>
            <tbody>
              <tr>
                <th>Resource ID </th>
                <th>Resource Name</th>
                <th>Owner</th>
                <th>Cost/Unit ($)</th>
                <th>Distance (mi)</th>
              </tr>
              @foreach($details as $res)
                <tr>
                  <td> {{$res->id}} </td>
                  <td> {{$res->name}} </td>
                  <td> {{$res->owner}} </td>
                  <td> $ {{$res->cost}}/{{$res->unit}} </td>
                  <td> {{$res->distance}} </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <p class="search-results">No results found!</p>
        @endif
      @endif
    </div>
  </div>
@endsection
