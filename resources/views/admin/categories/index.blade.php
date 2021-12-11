@extends('layouts.admin')
@section('title', 'Categorias')
@section('content')
<header class="page-header">
    <h2>Categorias</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>Configurações</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <section class="card">
            <div class="card-body">
                <a class="mb-1 mt-1 mr-1 btn btn-success" href="{{ route('categories.form') }}">
                    <i class="fas fa-plus"></i> Cadastrar Novo
                </a>
            </div>
        </section>
    </div>
</div>
<div class="row">
    <div class="col">
        <section class="card">
            <header class="card-header">
                <div class="card-actions">
                    <a href="tables-advanced.html#" class="card-action card-action-toggle" data-card-toggle></a>
                    <a href="tables-advanced.html#" class="card-action card-action-dismiss" data-card-dismiss></a>
                </div>

                <h2 class="card-title">Categorias Cadastradas</h2>
                <p class="card-subtitle">
                    Listagem de todas as categorias cadastradas
                </p>
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0" 
                id="datatable-default" data-delete="{{ route('categories.delete') }}" 
                data-edit="{{ route('categories.edit') }}" 
                data-list="{{ route('categories.list.all') }}" data-cols='[
                    { "data": "id","title":"#" },
                    { "data": "title","title":"Título" },
                    { "data": "type","title":"Tipo" },
                    { "data": "url","title":"URL" },
                    { "title":"Opções" }
                ]'>
                    <thead>
                    </thead>
                    <tbody>
                      
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
@endsection