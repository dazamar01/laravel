@extends('master')

@section('content')
<h1>Bienvenido {{ auth()->user()->email }}</h1>
<div class="panel-body">
  <form method="POST" action="{{ route('logout') }}">
    {{ csrf_field() }}
    <button class="btn btn-danger">
      Cerrar Sesión
    </button>
  </form>
</div>
@endsection