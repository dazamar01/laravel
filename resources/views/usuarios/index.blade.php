@extends('master')

@section('title')
Usuarios
@endsection

@section('content')
<h1>Usuarios</h1>
@include('usuarios.user-list', array('user' => $name))
@endsection