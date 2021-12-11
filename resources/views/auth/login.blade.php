@extends('layouts.login')
@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="{{ route('nav.index') }}" class="logo">
            <img src="{{ asset('img/logo.png') }}" alt="Painel Administrativo" />
        </a>
        <div class="panel card-sign">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label>E-mail</label>
                        <div class="input-group">
                            <input id="email" type="email"
                                class="form-control form-control form-control-lg @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </span>
                            </span>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <div class="clearfix">
                            <label class="float-left">Senha</label>
                            <a href="{{ route('password.request') }}" class="float-right">Perdeu sua senha?</a>
                        </div>
                        <div class="input-group">
                            <input id="password" type="password"
                                class="form-control form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password">
                            <span class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </span>
                            </span>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-sm-8">
                            <div class="checkbox-custom checkbox-default">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Lembre-me
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-right">
                            <button type="submit" class="btn btn-primary mt-2">Entrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2021. Todos os direitos reservados.</p>
    </div>
</section>
@endsection