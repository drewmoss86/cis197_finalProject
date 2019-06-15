@extends('layouts/app')

@section('pageTitle', 'Resource Information')

@section('content')
  <div class="container float-center add-form">
    <div class="container header">
      <a class="float-right fas fa-plus-square fa-3x" href="./create" style="text-decoration: none;"></a>

      <h1>New Resource Information</h1>

      {!! Form::open(['action' => 'ResourcesController@store', 'method' => 'POST']) !!}
        @csrf

        <br>

        <strong>Resource ID</strong> <small>(assigned on save)</small>

        <br><br>

        <strong>Owner</strong><br>
        {{Auth::user()->name}}

        <br><br>

        <div class="form-group resources">
          <label name="res_name"> <strong>Resource Name*</strong> <small>(required)</small> </label>
          <input name="res_name" class="form-control" required />
        </div>

        <br>

        <div class="form-group resources">
          <label name='pFunc'> <strong>Primary Function</strong> </label> <br>
          <select class="btn btn-secondary dropdown-toggle function-toggle" data-toggle="dropdown" id="primaryFunction" aria-haspopup="true" aria-expanded="false" name="pFunc" required>
              @foreach ($functions as $func)
                  <option value={{$func->id}}> #{{$func->id}} {{$func->description}}</option>
              @endforeach
          </select>
        </div>

        <br>

        <div class="form-group resources">
          <label name="sFunc"> <strong>Secondary Function</strong> </label>
          <table name="sFunc" class="sFunc table" id="secondaryFunction">
            @foreach ($functions as $func)
              <tbody>
                <tr data-sec-val={{$func->id}}>
                  <td><input id="sFunc-input" name="sFunc[]" type="checkbox" class="form-control" value="{{$func->id}}">#{{$func->id}} {{$func->description}}</td>
                </tr>
              </tbody>
            @endforeach
          </table>
        </div>

        <br>

        <div class="form-group description">
          <label name="description"> <strong>Description</strong> <small>(optional)</small> </label>
          <input name="description" class="form-control" type="text" placeholder="Describe the resource">
        </div>

        <br>

        <div class="form-group distance">
          <label name="distance"> <strong>Distance from PCC</strong> <small>(optional)</small> </label>
          <div class="form-group miles">
            <input name="distance" class="form-control" type="number" placeholder="0.0" step="0.1" /> miles
          </div>
        </div>

        <br>

        <div class="form-group capabilities">
          <label name="capabilities"> <strong>Capabilities</strong> <small>(optional)</small> </label>
          <div class="form-group capabilities input-button">
            <input id="capabilities" name="capabilities" class="form-control" type="text" />
            <button class="btn btn-primary add-btn" type="button" onclick="addButton()">Add</button>
          </div>

          <br>
          {{-- hidden input to display the added capabilities --}}
          <input name="btnCap" type="hidden" class="form-control hiddenCap" />
          <p class="hiddenCap_paragraph"> </p>
          {{-- dislay each new capability --}}
          <em> <p class="btnCap"></p> </em>
        </div>

        {{-- <br> --}}

        <div class="form-group cost">
          <label name="cost"> <strong>Cost*</strong> <small>(required) USD</small> </label>
          <div class="form-group per">
            <b>$</b> <input name="cost" class="form-control" type="number" step="0.01" required>
            <b>Per*</b>
            <select class="btn btn-secondary dropdown-toggle use-toggle" data-toggle="dropdown" id="inlineFormCategory" aria-haspopup="true" aria-expanded="false" name="per">
              @foreach($units as $uni)
                <option select value="{{$uni->id}}">{{$uni->description}}</option>
              @endforeach
            </select>
          </div>
        </div>

        <div class="float-right save-cancel-btn mb-5">
          {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
          <a class="btn btn-default" href="/">Cancel</a>
        </div>
      {!! Form::close() !!}
      <script src="{{ asset('/assets/js/create.js') }}" async></script>
    </div>
  </div>
@stop
