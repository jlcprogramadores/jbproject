@extends('adminlte::auth.auth-page')

@section('auth_body')
    <div class="auth-box">
        <div class="auth-title">
            <h5>Autenticarse para Iniciar sesión</h5>
        </div>
        <hr>
        <form class="auth-form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group input-group">
                <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Correo electrónico" required autofocus>
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-envelope"></i>
                    </span>
                </div>
            </div>
            <div class="form-group input-group">
                <input type="password" name="password" id="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Contraseña" required>
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>Correo o Contraseña Invalido</strong>
                    </span>
                @endif
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Recuérdame</label>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar sesión</button>
        </form>
        <div class="auth-links">
            {{-- <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a> --}}
        </div>
    </div>
@endsection