<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="{{ route('home') }}">{!! logoColegio() !!}</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">Home</a>
      </li>
      <li class="nav-item {{ request()->routeIs('colegio.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('colegio.index') }}">Colegio</a>
      </li>
      <li class="nav-item {{ request()->routeIs('alumnos.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('alumnos.index') }}">Alumno</a>
      </li>
      <li class="nav-item {{ request()->routeIs('ciudad.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('ciudad.index') }}">Ciudad</a>
      </li>
      <li class="nav-item {{ request()->routeIs('prevision.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('prevision.index') }}">Previsión</a>
      </li>
      <li class="nav-item {{ request()->routeIs('tiposangre.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tiposangre.index') }}">Tipo de Sangre</a>
      </li>
      <li class="nav-item {{ request()->routeIs('tipoapoderado.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tipoapoderado.index') }}">Tipo de Apoderado</a>
      </li>
      <li class="nav-item {{ request()->routeIs('apoderado.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('apoderado.index') }}">Apoderado</a>
      </li>
    </ul>
  </div>
</nav>