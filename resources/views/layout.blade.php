<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','COLEGIO')</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="{{ url('/assets/css/style.css?v='.time()) }}">

    <!-- PUGINS -->
    <link rel="stylesheet" href="{{ url('/assets/plugins/picker/themes/classic.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/picker/themes/classic.date.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/dataTables/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/plugins/chosen/chosen.min.css') }}">

  </head>
  <body>

    @include('partials.nav')

    @include('partials.flash-message')
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>   

    <!-- PUGINS -->
    <script src="{{ url('/assets/plugins/picker/picker.js') }}"></script>
    <script src="{{ url('/assets/plugins/picker/picker.date.js') }}"></script>
    <script src="{{ url('/assets/plugins/picker/translations/es_ES.js') }}"></script>
    <script src="{{ url('/assets/plugins/dataTables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/dataTables/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('/assets/plugins/chosen/chosen.jquery.min.js') }}"></script>

    <!-- FUNCIONES -->
    <script src="{{ url('/assets/js/validate.js') }}"></script>
    <script src="{{ url('/assets/js/funciones.js') }}"></script>
      
    @yield('scripts')
          
  </body>
</html>