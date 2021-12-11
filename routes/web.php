<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'NavigationController@index')->name('nav.index');

Route::get('/contato', 'NavigationController@contato')->name('nav.contato');
Route::get('/sendmail', 'EmailController@email')->name('nav.email');

Auth::routes();

//Rotas para utilizacao de auten
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    //Informações Gerais
    Route::get('/', 'InformationsController@index')->name('information.index');
    Route::post('/informacoes/salvar', 'InformationsController@save')->name('information.save');

    //Banners
    Route::get('/banners', 'BannersController@index')->name('banners.index');
    Route::get('/banners/listar/todos', 'BannersController@readAll')->name('banners.list.all');
    Route::get('/banners/editar/{id?}', 'BannersController@form')->name('banners.edit');
    Route::get('/banners/cadastro', 'BannersController@form')->name('banners.form');
    Route::post('/banners/salvar', 'BannersController@save')->name('banners.save');
    Route::post('/banners/editar/salvar/{id}', 'BannersController@save')->name('banners.edit.save');
    Route::get('/banners/deletar/{id?}', 'BannersController@delete')->name('banners.delete');

    //Categorias
    Route::get('/categorias', 'CategoriesController@index')->name('categories.index');
    Route::get('/categorias/listar/todos', 'CategoriesController@readAll')->name('categories.list.all');
    Route::get('/categorias/editar/{id?}', 'CategoriesController@form')->name('categories.edit');
    Route::get('/categorias/cadastro', 'CategoriesController@form')->name('categories.form');
    Route::post('/categorias/salvar', 'CategoriesController@save')->name('categories.save');
    Route::post('/categorias/editar/salvar/{id}', 'CategoriesController@save')->name('categories.edit.save');
    Route::get('/categorias/deletar/{id?}', 'CategoriesController@delete')->name('categories.delete');

    //Conteudo
    Route::get('/conteudo/{_type}', 'ContentsController@index')->name('content.index');
    Route::get('/conteudo/listar/todos/{_type}', 'ContentsController@readAll')->name('content.list.all');
    Route::get('/conteudo/editar/{_type}/{id?}', 'ContentsController@form')->name('content.edit');
    Route::get('/conteudo/cadastro/{_type}', 'ContentsController@form')->name('content.form');
    Route::post('/conteudo/salvar', 'ContentsController@save')->name('content.save');
    Route::post('/conteudo/editar/salvar/{id}', 'ContentsController@save')->name('content.edit.save');
    Route::get('/conteudo/deletar/{id?}', 'ContentsController@delete')->name('content.delete');
});
