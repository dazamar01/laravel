<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  @if (trim($__env->yieldContent('title')))
    <title>@yield('title')</title>
  @else
  <title>Demo</title>
  @endif
  <base href="{{ URL::asset('/') }}">
  <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/ytproject-style.css')}}">
  
  <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.14.1/dist/bootstrap-table.min.css">
  
  <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>

  
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Demo</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ setActive('home', 'active') }}">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              {{-- <a class="nav-link" href="/usuarios">Usuarios</a> --}}
              <a class="nav-link {{ setActive('usuarios', 'active') }}" href="/usuarios">Usuarios</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{ auth()->user()->username }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Perfil</a>
                <a class="dropdown-item" href="#">Usuarios</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout2') }}">Salir</a>
              </div>
            </li>
          </ul>
        </div>
        
      </nav>

  <div class="container">
    @if(!empty(Session::get('info')))
      <div class="alert alert-info alert-dismissible auto-hide">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('info')}}
      </div>
    @endif
    @if(!empty(Session::get('success')))
      <div class="alert alert-success alert-dismissible auto-hide">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('success')}}
      </div>
    @endif
    @if(!empty(Session::get('warning')))
      <div class="alert alert-warning alert-dismissible auto-hide">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('warning')}}
      </div>
    @endif
    @if(!empty(Session::get('danger')))
      <div class="alert alert-danger alert-dismissible auto-hide">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
        {{Session::get('danger')}}
      </div>
    @endif
    <br/>
    @yield('content')
    
  </div>

  <script src="{{url('js/popper.min.js')}}"></script>
  <script src="{{url('js/bootstrap.min.js')}}"></script>
  <script src="{{url('js/generales.js')}}"></script>

  <script src="https://unpkg.com/bootstrap-table@1.14.1/dist/bootstrap-table.min.js"></script>

  <script>
    $( document ).ready(function() {
      $(".auto-hide").fadeTo(1800, 500).slideUp(500, function(){
          $(".auto-hide").slideUp(500);
      });
      

    });
  </script>
  
</body>
</html>