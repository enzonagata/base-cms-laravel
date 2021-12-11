@extends('layouts.login')
@section('content')
<!-- start: page -->
<section class="body-sign">
    <div class="center-sign">
        <a href="javascript:;" class="logo">
            <img src="{{ asset('img/logo.png') }}" style="width:22%;" alt="Painel Administrativo" />
        </a>
        <div class="panel card-sign">
            <div class="card-body">
                <div class="alert alert-info">
                    <p class="m-0">Digite o seu e-mail que iremos enviar as instruções para a recuperação de senha.</p>
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="form-group mb-0">
                        <div class="input-group">
                            <input name="username" type="email" placeholder="E-mail"
                                class="form-control form-control-lg" />
                            <span class="input-group-append">
                                <button class="btn btn-primary btn-lg" type="submit">Resetar!</button>
                            </span>
                        </div>
                    </div>

                    <p class="text-center mt-3">Lembrou? <a href="{{ route('login') }}">Entrar!</a></p>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 mb-3">&copy; Copyright 2020. Todos os direitos reservados.</p>
    </div>
</section>
@endsection