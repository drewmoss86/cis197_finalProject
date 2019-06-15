{{-- check errors array when we fail validation --}}
@if(count($errors) > 0) 
    @foreach($errors->all() as $err) 
        <div class="alert alert-danger">
            {{$err}}
        </div>
    @endforeach
@endif

{{-- if the session is successful, display success message --}}
{{-- @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif --}}

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3 col-md-15" role="alert">
        {{session('success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- if the session fails, display error message --}}
@if(session('err'))
    <div class="alert alert-danger">
        {{session('err')}}
    </div>
@endif
