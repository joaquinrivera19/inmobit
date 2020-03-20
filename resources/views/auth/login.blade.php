@extends('layouts.app')

@section('content')
    <body class="login">
    <div class="wrap">
        <div class="login-content">
            <div class="access-box">
                <div class="auth-page-container">
                    <div class="main-form front">
                        <div class="access_box_inside">
                            <div class="logo">
                                <img src="{{ asset('images/logo.png') }}"/>
                            </div>
                            <h2>Acceso a usuarios</h2>
                            <form name="Login_form" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="box-error-container">
                                    <div class="box-error">
                                        <div>Alguno de los datos no es correcto.<br/>Por favor, verifícalo y vuelve a
                                            intentar.
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <i class="fa fa-user"></i>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email"
                                           value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <i class="fa fa-lock"></i>
                                    <input type="password" id="password" name="password" class="form-control"
                                           placeholder="Contraseña" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <button type="submit" class="btn btn-orange btn-block">INGRESAR</button>


                                <label class="remind-user">
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>Recordarme
                                </label>
                                <a class="toggler" title="Reestablecer tu contraseña" href="#">Recuperar mi
                                    contraseña</a>

                                <p class="access-copy">
                                    Powered by<img src="{{ asset('images/conaxis.png') }}" alt="Conaxis"/>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="main-form back">
                        <div class="access_box_inside">
                            <div class="logo">
                                <img src="{{ asset('images/logo.png') }}"/>
                            </div>
                            <div class="box-error-container">
                                <div class="box-error">
                                    <div>El e-mail ingresado no existe.<br/>Intente nuevamente.</div>
                                </div>
                            </div>
                            <h2>Reestablecer contraseña</h2>
                            <div class="form-group">
                                <input type="text" class="form-control" name="forgot"
                                       placeholder="Email asociado a tu cuenta">
                            </div>
                            <button type="button" class="btn btn-orange btn-block">Reestablecer</button>
                            <a class="toggler" title="Iniciar sesión" href="#">Iniciar sesión con mi cuenta</a>
                            <p class="access-copy">
                                Powered by<img src="{{ asset('images/conaxis.png') }}" alt="Conaxis"/>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
@endsection
