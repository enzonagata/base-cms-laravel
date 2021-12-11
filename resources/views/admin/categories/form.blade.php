@extends('layouts.admin')
@section('title', 'Categoria')
@section('content')
<header class="page-header">
    <h2>Categoria</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ route('information.index') }}">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>Cadastro de Categoria</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <form class="form-horizontal form-bordered" id="form_cadastre" method="post"
            action="{{ isset($entity->id)?route('categories.edit.save',['id'=>$entity->id]):route('categories.save') }}"
            data-reload="{{ route('categories.index') }}""
            >
            @csrf
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="forms-basic.html#" class="card-action card-action-toggle" data-card-toggle=""></a>
                    </div>
                    <h2 class="card-title">Cadastro de Categorias variadas</h2>
                    <p class="card-subtitle">
                        Preencha o título da categoria e selecione a onde ela pertence.
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
                                                <i class="fas fa-font"></i>
                                            </span>
                                        </span>
                                        <input value="{{ isset($entity->title)?$entity->title:'' }}" type="text"
                                            name="title" class="form-control" placeholder="Título" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{--  <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fas fa-list-ul"></i>
                                            </span>
                                        </span>
                                        <select name="type" class="form-control" required>
                                            <option value=""> --- Selecione um tipo --- </option>
                                            <option {{ (isset($entity->type) and ($entity->type=='news'))?'selected':'' }}
                                                value="news">Blog / Notícias</option>

                                            <option {{ (isset($entity->type) and ($entity->type=='tema'))?'selected':'' }}
                                            value="tema">Tema</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>  --}}
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