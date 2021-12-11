@extends('layouts.admin')
@section('title', 'Banners')
@section('content')
<header class="page-header">
    <h2>Banners</h2>
    <div class="right-wrapper text-right">
        <ol class="breadcrumbs">
            <li>
                <a href="index.html">
                    <i class="fas fa-home"></i>
                </a>
            </li>
            <li><span>Banners</span></li>
        </ol>
        <a class="sidebar-right-toggle" data-open=""><i class="fas fa-chevron-left"></i></a>
    </div>
</header>
<div class="row">
    <div class="col">
        <section class="card">
            <div class="card-body">
                <a class="mb-1 mt-1 mr-1 btn btn-success" href="{{ route('banners.form') }}">
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
                
                <h2 class="card-title">Banners Cadastradas</h2>
                <p class="card-subtitle">
                    Listagem de todas os banners cadastradas
                </p>
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0" 
                id="datatable-default" data-delete="{{ route('banners.delete') }}" 
                data-edit="{{ route('banners.edit') }}" 
                data-list="{{ route('banners.list.all') }}" data-cols='[
                    { "data": "id","title":"#" },
                    { "data": "title","title":"Nome" },
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