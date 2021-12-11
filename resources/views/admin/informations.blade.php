@extends('layouts.admin')
@section('title', 'Informações do Site')
@section('content')
<header class="page-header">
    <h2>Informações Básicas</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>Informações Básicas</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <form class="form-horizontal form-bordered" id="form_cadastre" method="post"
            action={{ route('information.save') }}>
            @csrf
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>

                    <h2 class="card-title">Informações para Contato</h2>
                    <p class="card-subtitle">
                        Informações de redes sociais e contato.
                    </p>
                </header>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-facebook"></i>
                                            </span>
                                        </span>
                                        <input value="{{ isset($entity->facebook)?$entity->facebook:'' }}" type="text" name="facebook"
                                            class="form-control" placeholder="facebook">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-instagram"></i>
                                            </span>
                                        </span>
                                        <input value="{{ isset($entity->instagram)?$entity->instagram:'' }}" type="text" name="instagram"
                                            class="form-control" placeholder="instagram">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-linkedin"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{ isset($entity->linkedin)?$entity->linkedin:'' }}" name="linkedin"
                                            class="form-control" placeholder="linkedin">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-twitter"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{ isset($entity->twitter)?$entity->twitter:'' }}" name="twitter"
                                            class="form-control" placeholder="twitter">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-pinterest"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{ isset($entity->pinterest)?$entity->pinterest:'' }}" name="pinterest"
                                            class="form-control" placeholder="pinterest">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="email" value="{{ isset($entity->email)?$entity->email:'' }}"
                                            class="form-control" placeholder="E-mail">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fab fa-whatsapp"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="whatsapp" value="{{ isset($entity->whatsapp)?$entity->whatsapp:'' }}"
                                            class="form-control" placeholder="whatsapp">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="phone1" value="{{ isset($entity->phone1)?$entity->phone1:'' }}"
                                            class="form-control" placeholder="telefone 1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="phone2" value="{{ isset($entity->phone2)?$entity->phone2:'' }}"
                                            class="form-control" placeholder="telefone 2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>

                    <h2 class="card-title">Endereço</h2>
                    <p class="card-subtitle">
                        Informações de endereço da empresa que irão aparecer no site.
                    </p>
                </header>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-9">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-map-marker-alt"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{ isset($entity->address)?$entity->address:'' }}" name="address"
                                            class="form-control" placeholder="Endereço">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="text" value="{{ isset($entity->number)?$entity->number:'' }}" name="number"
                                            class="form-control" placeholder="nº">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" value="{{ isset($entity->complement)?$entity->complement:'' }}" name="complement"
                                            class="form-control" placeholder="Complemento">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input type="text" value=" {{ isset($entity->zipcode)?$entity->zipcode:'' }}" name="zipcode"
                                            class="form-control" placeholder="CEP">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="text" value="{{ isset($entity->district)?$entity->district:'' }}" name="district"
                                            class="form-control" placeholder="Bairro">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <div class="input-group">
                                        <input type="text" value="{{ isset($entity->state)?$entity->state:'' }}" name="state"
                                            class="form-control" placeholder="Estado">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="input-group">
                                        <input type="text" value=" {{ isset($entity->city)?$entity->city:'' }}" name="city" class="form-control"
                                            placeholder="Cidade">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <section class="card">
                <div class="card-body" style="display: block;">
                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-success">Salvar</button>
                </div>
            </section>
        </form>
    </div>
</div>
@endsection