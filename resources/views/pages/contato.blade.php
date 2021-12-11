@extends('layouts.default')
@section('css')

@endsection
@section('content')
<div class="top_banner">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="javascript:;">Apmp</a></li>
                    <li>Contato</li>
                </ul>
            </div>
            <h1>Fale Conosco</h1>
        </div>
    </div>
    <img src="{{ asset('img/sao-jose-do-rio-preto.jpg') }}" class="img-fluid" alt="">
</div>
<main class="bg_gray">

    <div class="container margin_60">
        <div class="main_title">
            <h2>Fale Conosco</h2>
            <p>Entre em contato conosco através do formulário de contato abaixo.</p>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
    <div class="bg_white">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 offset-sm-3 add_bottom_25">
                    <div class="form-group">
                        <input class="form-control" type="text" placeholder="Nome *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" placeholder="E-mail *">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="telefone" placeholder="Telefone *">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" style="height: 150px;" placeholder="Mensagem *"></textarea>
                    </div>
                    <div class="form-group">
                        <input class="btn_1 full-width" type="submit" value="Enviar">
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_white -->
</main>

@endsection