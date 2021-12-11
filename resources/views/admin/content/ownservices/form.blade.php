@php
$title = "Nosso Serviço"
@endphp
@extends('layouts.admin')
@section('title', $title)
@section('content')
<header class="page-header">
    <h2>{{ $title }}</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route('information.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>{{ $title }}</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <form class="form-horizontal form-bordered" id="form_cadastre" method="post"
            action="{{ isset($entity->id)?route('content.edit.save',['id'=>$entity->id]):route('content.save') }}"
            data-reload="{{ route('content.index',['_type'=>$_type]) }}">
            @csrf
            <input type="hidden" name="type" value="{{ $_type }}">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>

                    <h2 class="card-title">Informações básicas</h2>
                    <p class="card-subtitle">
                        Informações que serão utilizadas no SEO do site.
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
                                        <input value="{{ isset($entity->title)!=""?$entity->title:'' }}" type="text"
                                            name="title" class="form-control" placeholder="Titulo" required>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-lg-3 control-label text-lg-right pt-2">Categorias</label>
                                <div class="col-lg-6">
                                    <select name="categories[]" multiple data-plugin-selectTwo
                                        class="form-control populate" id="select_categories">
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                            {{ $category->contents[0]->pivot->categories_id==$category->id?'selected':"" }}>
                            {{ $category->title }}</option>
                            @endforeach
                            </select>
                        </div>
                    </div> --}}
                </div>
    </div>
</div>
</section>

{{-- <section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
        </div>
        <h2 class="card-title">Texto 1</h2>
    </header>
    <div class="card-body" style="display: block;">
        <div class="form-group row">
            <div class="col-lg-12">
                <textarea name="description" class="form-control">{{ isset($entity->description)?$entity->description:'' }}</textarea>
</div>
</div>
</div>
</section> --}}
<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
        </div>
        <h2 class="card-title">Descrição Curta</h2>
    </header>
    <div class="card-body" style="display: block;">
        <div class="form-group row">
            <div class="col-lg-12">
                <textarea name="short_description"
                    class="form-control">{{ isset($entity->short_description)?$entity->short_description:'' }}</textarea>
            </div>
        </div>
    </div>
</section>
<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
        </div>
        <h2 class="card-title">Conteúdo</h2>
        <p class="card-subtitle">
            Preenchar as informações abaixo para exibir os textos dinâmicos de acordo com o banner.
        </p>
    </header>
    <div class="card-body" style="display: block;">
        <div class="form-group row">
            <div class="col-lg-12">
                <textarea name="content" class="summernote">{{ isset($entity->content)?$entity->content:'' }}</textarea>
            </div>
        </div>
    </div>
</section>

<section class="card">
    <header class="card-header">
        <div class="card-actions">
            <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
        </div>
        <h2 class="card-title">Imagem Principal</h2>
        <p class="card-subtitle">
            Selecione uma imagem como imagem principal.<br />
            <br />
            <strong>Obs.: A imagem selecionada será automatimacamente reajustada para o tamanho na descrição
                do campo.</strong>
        </p>
    </header>
    <div class="card-body" style="display: block;">
        <div class="row">
            <div class="col-lg-12">
                <small>Tamanho da imagem 1920px x 850px</small>
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="input-append">
                        <div class="uneditable-input">
                            <i class="fas fa-file fileupload-exists"></i>
                            <span class="fileupload-preview"></span>
                        </div>
                        <span class="btn btn-default btn-file">
                            <span class="fileupload-exists">Trocar</span>
                            <span class="fileupload-new">Selecionar Imagem</span>
                            <input type="file" name='banner' accept="image/*" onchange='loadPreview(this, 1000,500)'
                                value="{{ isset($entity->image)!=""?"/content/".$entity->id."/".$entity->image:'' }}">
                        </span>
                        <a href="javascript:;" class="btn btn-default fileupload-exists"
                            data-dismiss="fileupload">Remove</a>
                        @if (isset($entity->image)!="")
                        <a href="javascript:;" class="btn btn-default" id="remove_image_default">Remove</a>
                        @endif
                        <input type="hidden" name="remove_image_default" />
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
                    <img id='output' class='img-fluid'
                        src='{{ isset($entity->image)!=""?"/content/".$entity->id."/".$entity->image:'' }}'>
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

        <h2 class="card-title">Galeria de Imagens</h2>
        <p class="card-subtitle">
            Use o campo abaixo, e selecione as imagens para a galeria.
        </p>
    </header>
    <div class="card-body">
        <div class='form-group'>
            <div class="col-md-12">
                <input type="file" id="gallery-photo-add" class="inputfile gallery-photo-add" multiple accept="image/*"
                    data-id="">
            </div>
        </div>
        <div class="progress progress-lg m-b-5">
            <div id='progressBar' class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="0"
                aria-valuemin="0" aria-valuemax="100">

            </div>
        </div>
        <div class="gallery">
            @isset($gallery)
            @foreach ( $gallery as $row )
            <div class="gallery_item">
                <img src={{ asset('content/'.$entity->id.'/thumb/'.$row->image) }} class="img-responsive" />
                <input type="hidden" name="gallery_image_update_id[]" value="{{ $row->id }}" />
                <input type="text" name="gallery_image_update_description[]" class="form-control input-sm"
                    placeholder="Descrição da imagem" value='{{ $row->description }}' />
                <a href="javascript:;" class="" id="gallery_item_remove" data-id='{{ $row->id }}'>
                    <i class="mdi mdi-delete"></i>Remover
                </a>
            </div>
            @endforeach
            @endisset
        </div>
        <div id='gallery_item_remove_image'>

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



<script id="delete_gallery_template" type="x-tmpl-mustache">
    <input type="text" name="delete_gallery[]" class="form-control input-sm" placeholder="" value=" "/>
</script>
<script id="thumb_template" type="x-tmpl-mustache">
    <div class="gallery_item">
        <img src="@{{ thumb }}" class="img-responsive"/>
        <input type="hidden" name="gallery_image[]" value="@{{ original }}" />
        <input type="hidden" name="gallery_image_thumb[]" value="@{{ thumb }}" />
        <input type="text" name="gallery_image_description[]" class="form-control input-sm" placeholder="Descrição da imagem"/>
        <a href="javascript:;" class="" id="gallery_item_remove">
            <i class="mdi mdi-delete"></i>Remover
        </a>
    </div>
</script>

@endsection