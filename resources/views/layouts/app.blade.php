<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Grab page title from each page --}}
    <title> @yield('pageTitle')</title>

    <!-- Scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="{{ asset('/assets/js/edit.js') }}"></script>
    <script src="{{ asset('/assets/js/search.js')}}"></script>
    {{-- adds text editor box --}}
    <script src="//cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Icons from Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/create.css') }}" rel="stylesheet">
    <link href="{{ asset('/assets/css/search.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/css/report.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/css/resource.css')}}" rel="stylesheet">
    <link href="{{ asset('/assets/css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>
    @include('includes/navbar')
    <main class="py-4">
        <div class="container">
            {{-- <div class="row justify-content-center main"> --}}

            @yield('content')
            {{-- </div> --}}
        </div>
    </main>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<!-- Ckeditor script -->
<script>
 var editor = CKEDITOR.replace( 'ckeditor1', {
  language: 'en',
  extraPlugins: 'notification'
 });
 editor.on( 'required', function( evt ) {
    editor.showNotification( 'This field is required.', 'warning' );
    evt.cancel();
 });
</script>
</body>
</html>
