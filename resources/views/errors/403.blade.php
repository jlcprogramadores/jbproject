@extends('adminlte::page')
@section('title','Error 403')

@section('content')
<section class="content">
  <div class="error-page">
    <br>
    <h2 class="headline text-warning"> 403</h2>
    <br>
    <div class="error-content">
      <h3><i class="fas fa-exclamation-triangle text-warning"></i> No tienes acceso al recurso solicitado.</h3>

      <p>
        Por favor contacta al administrador si crees que se trata de un error.
      </p>
      <p>
        <a  href="{{ route('home') }}">Regresar a Home</a>
      </p>
      </form>
    </div>
  </div>
</section>
</div>
@endsection