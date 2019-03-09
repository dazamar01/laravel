<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Demo Project</title>
  <base href="{{ URL::asset('/') }}" >
  <link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ url('css/ytproject-style.css')}}">

  <script src="{{url('js/jquery-3.3.1.min.js')}}"></script>

  
</head>
<body>

  <hr/>
    
  <div class="container">
    <hr>
    @if(session()->has('flash'))
      <div class="alert alert-info">
        {{session('flash')}}
      </div>
    @endif
    <div class="row justify-content-md-center">
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h1 class="panel-title">Acceso</h1>
              <br/>
            </div>
            <div class="panel-body">
              <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" 
                    type="email" name="email"
                    value="{{old('email')}}"
                    placeholder="Ingresa tu email">
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                  <label for="password">Contraseña</label>
                  <input class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}"
                    type="password" name="password" placeholder="Ingresa tu contraseña">
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>
                <button class="btn btn-primary btn-block">Acceder</button>
              </form>
            </div>
          </div>
        </div>
    </div>
    
  </div>

  <script src="{{url('js/bootstrap.min.js')}}"></script>
  
</body>
</html>