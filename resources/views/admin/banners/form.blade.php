@extends('layouts.admin')
@section('title', 'Banners')
@section('content')
<header class="page-header">
    <h2>Banners</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route('information.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>Cadastro de Banners</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <form class="form-horizontal form-bordered" id="form_cadastre" method="post"
            action="{{ isset($entity->id)?route('banners.edit.save',['id'=>$entity->id]):route('banners.save') }}"
            data-reload="{{ route('banners.index') }}">
            @csrf

            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>

                    <h2 class="card-title">Textos no Banners</h2>
                    <p class="card-subtitle">
                        Preenchar as informações abaixo para exibir os textos dinâmicos de acordo com o banner.
                    </p>
                </header>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                        </span>
                                        <input value="{{ isset($entity->title)!=""?$entity->title:'' }}" type="text" name="title" class="form-control"
                                            placeholder="Título do banner" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                        </span>
                                        <input value="{{ isset($entity->info1)!=""?$entity->info1:'' }}" type="text" name="info1" class="form-control"
                                            placeholder="Texto 1">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-link"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="link1" value="{{ isset($entity->link1)!=""?$entity->link1:'' }}" class="form-control"
                                            placeholder="Link 1">
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
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                        </span>
                                        <input type="text" value="{{ isset($entity->info2)!=""?$entity->info2:'' }}" name="info2" class="form-control"
                                            placeholder="Texto 2">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-link"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="link2" value="{{ isset($entity->link2)!=""?$entity->link2:'' }}" class="form-control"
                                            placeholder="Link 2">
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
                                                <i class="fas fa-align-left"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="info3" value="{{ isset($entity->info3)!=""?$entity->info3:'' }}" class="form-control"
                                            placeholder="Texto 3">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-link"></i>
                                            </span>
                                        </span>
                                        <input type="text" name="link3" value="{{ isset($entity->link3)!=""?$entity->link3:'' }}" class="form-control"
                                            placeholder="Link 3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </section>

            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>
                    <h2 class="card-title">Banner</h2>
                    <p class="card-subtitle">
                        Selecione a image para a inserção de banner.<br />
                        <br />
                        <strong>Obs.: A imagem selecionada será automatimacamente reajustada para o tamanho na descrição
                            do campo.</strong>
                    </p>
                </header>
                <div class="card-body" style="display: block;">
                    <div class="row">
                        <div class="col-lg-12">
                            <small>Tamanho da imagem 1920px x 700px</small>
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="input-append">
                                    <div class="uneditable-input">
                                        <i class="fas fa-file fileupload-exists"></i>
                                        <span class="fileupload-preview"></span>
                                    </div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileupload-exists">Trocar</span>
                                        <span class="fileupload-new">Selecionar Imagem</span>
                                        <input type="file" name='banner' accept="image/*"
                                            onchange='loadPreview(this, 1920,700)' {{ isset($entity)?'':'required' }}>
                                    </span>
                                    <a href="forms-basic.html#" class="btn btn-default fileupload-exists"
                                        data-dismiss="fileupload">Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <textarea id="base64" name="base64" style="display:none;"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="img-content">
                                <img id='output' class='img-fluid' src='{{ isset($entity->image)!=""?"/banners/".$entity->image:'' }}'>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="card">
                <div class="card-body" style="display: block;">
                    <button type="submit" class="mb-1 mt-1 mr-1 btn btn-success"><i class="fas fa-save"></i>
                        Salvar</button>
                </div>
            </section>
        </form>
    </div>
</div>
@endsection

