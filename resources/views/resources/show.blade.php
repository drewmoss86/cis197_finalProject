@extends('layouts/app')

@section('content')
  <fieldset>
    <div class="container float-center add-form">
      <div class="container header">
        @include('includes/message')
        <a href="/resources/create" class="btn btn-primary go-back">Go back</a>

        <hr>

        <div class="form-group">
          <label name="resource_id"> <strong>Resource ID</strong> </label>
          <br>
          {{ $res->id }}
        </div>

        <br>

        <div class="form-group">
          <label name="owner"> <strong>Owner</strong> </label>
          <br>
          {{ Auth::user()->name }}
        </div>

        <br>

        <div class="form-group">
          <label name="res_name"> <strong>Resource Name*</strong> </label>
          <br>
          {{ $res->name }}
        </div>

        <br>

        <div class="form-group">
          <label name='pFunc'> <strong>Primary Function</strong> </label>
          <br>
          {{ $pFuncs->description }}
        </div>

        <br>

        <div class="form-group">
          <label name="sFunc"> <strong>Secondary Function</strong> </label>
          <br>
          {{-- print each secondary function --}}
          <? for($i = 0; $i < count($addSecFuncs); $i++) { ?>
              {{$addSecFuncs[$i]->description}} <br>
          <? } ?>
        </div>

        <br>

        <div class="form-group">
          <label name='pFunc'> <strong>Description</strong> </label>
          <br>
          {{ $res->description }}
        </div>

        <br>

        <div class="form-group">
          <label name="distance"> <strong>Distance from PCC</strong> </label>
          <br>
          {{ $res->distance_from_pcc }}
        </div>

        <br>

        <div class="form-group">
          <label name="capabilities"> <strong>Capabilities</strong> </label>
          <br>
          {{ $res->capabilities }}
        </div>

        <br>

        <div class="form-group">
          <label name="cost"> <strong>Cost*</strong> <small>(USD)</small> </label>
          <br>

          <b>$</b> {{ number_format($res->cost, 2) }} / {{ $units->description }}
        </div>

      </div>
    </div>
  </fieldset>
@endsection
{{-- prevent resubmission on page refresh --}}
<footer>
  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, '/resources/create' );
    }
</script>
</footer>
