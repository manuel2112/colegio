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
    
  </head>
  <body>

    @include('partials.nav')

    @include('partials.flash-message')
    @yield('content')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>   

    <!-- PUGINS -->
    <script src="{{ url('/assets/plugins/picker/picker.js') }}"></script>
    <script src="{{ url('/assets/plugins/picker/picker.date.js') }}"></script>
    <script src="{{ url('/assets/plugins/picker/translations/es_ES.js') }}"></script>

    <script src="{{ url('/assets/js/validate.js') }}"></script>
    <script src="{{ url('/assets/js/funciones.js') }}"></script>   
      
  </body>
</html>