@php
    $title = "Produtos"    
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
        <section class="card">
            <div class="card-body">
                <a class="mb-1 mt-1 mr-1 btn btn-success" href="{{ route('content.form',['_type'=>$_type]) }}">
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
                <h2 class="card-title">{{ $title }} Cadastrados</h2>
                {{-- <p class="card-subtitle">
                    ----
                </p> --}}
            </header>
            <div class="card-body">
                <table class="table table-bordered table-striped mb-0" 
                id="datatable-default" data-delete="{{ route('content.delete') }}" 
                data-edit="{{ route('content.edit',['_type'=>$_type ]) }}" 
                data-list="{{ route('content.list.all',['_type'=>$_type]) }}" data-cols='[
                    { "data": "title","title":"Nome" },
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