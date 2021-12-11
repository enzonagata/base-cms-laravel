<?php

namespace App\Http\Controllers;

use App\Models\Contents;
use App\Models\Informations;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class NavigationController extends Controller
{

    public function __construct()
    {
        //Habilita a visualizaçao da SQL
        DB::enableQueryLog();
        //->dd(DB::getQueryLog())
        //Informações gerais do site
        $informations = Informations::get()->first();
        View::share('informations', $informations);
        $services = Contents::where('type', '=', 'ownservices')->orderBy('created_at', 'desc')->limit(6)->get();
        View::share('menu_services', $services);
    }

    public function index()
    {
        //Noticias
        $top = Contents::where('type', '=', 'news')->orderBy('created_at', 'desc')->get()->first();
        $top2 = Contents::where('type', '=', 'news')->with('categories')->orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first();
        $top3 = Contents::where('type', '=', 'news')->with('categories')->orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first();
        $top4 = Contents::where('type', '=', 'news')->with('categories')->orderBy('created_at', 'desc')->skip(3)->take(1)->get()->first();
        //Noticias
        $news = Contents::where('type', '=', 'news')->orderBy('created_at', 'desc')->limit(6)->get();
        //Servicos
        $services = Contents::where('type', '=', 'ownservices')->orderBy('created_at', 'desc')->limit(6)->get();
        //Classificados
        $products = Contents::where('type', '=', 'products')->orWhere('type', '=', 'services')->orderBy('created_at', 'desc')->limit(8)->get();

        return view('pages.index', [
            'top' => $top,
            'top2' => $top2,
            'top3' => $top3,
            'top4' => $top4,
            'news'=>$news,
            'services' => $services,
            'products' => $products
        ]);
    }

    public function quemsomos()
    {
        $content = Contents::where('type', '=','quemsomos')->get()->first();
        return view('pages.quemsomos', ['content' => $content]);
    }

    public function equipe()
    {
        $content = Contents::where('type', '=','equipe')->get()->first();
        return view('pages.equipe', ['content' => $content]);
    }


    public function noticias(Request $req)
    {
        $news = Contents::where('type', '=', 'news')->orderBy('created_at', 'desc')->paginate(6);
        return view('pages.noticias', ['news' => $news]);
    }

    public function noticia(Request $req)
    {
        $url = $req->route('url');
        $content = Contents::where('url', '=', $url)->get()->first();
        return view('pages.noticia', ['content' => $content]);
    }

    public function produtos(Request $req)
    {
        $sort = $req->query('sort');
        $term = $req->query('term');

        //Condições de ordenação
        switch ($sort) {
            case 'asc-title':
                $field = 'title';
                $order = 'asc';
                break;
            case 'desc-title':
                $field = 'title';
                $order = 'desc';
                break;
            case 'asc-price':
                $field = 'price';
                $order = 'asc';
                break;
            case 'desc-price':
                $field = 'price';
                $order = 'desc';
                break;
            default:
                $field = 'created_at';
                $order = 'desc';
                break;
        }


        if (isset($term) and $term != "") {
            echo $products = Contents::whereIn('type', ['products', 'services'])
                ->Where(function ($query) use ($term) {
                    $query->orWhere('title', 'like', '%' . $term . '%');
                    $query->orWhere('short_description', 'like', '%' . $term . '%');
                    $query->orWhere('content', 'like', '%' . $term . '%');
                })
                ->orderBy($field, $order)->paginate(16);
        } else {
            $products = Contents::whereIn('type', ['products', 'services'])->orderBy($field, $order)->paginate(16);
        }

        return view('pages.produtos', ['products' => $products]);
    }

    public function produto(Request $req)
    {
        $url = $req->route('url');
        $content = Contents::where('url', '=', $url)->get()->first();
        $gallery = $content->images()->get();
        return view('pages.produto', ['content' => $content, 'gallery' => $gallery]);
    }

    public function servico(Request $req)
    {
        $url = $req->route('url');
        $content = Contents::where('url', '=', $url)->get()->first();
        $gallery = $content->images()->get();
        return view('pages.servico', ['content' => $content, 'gallery' => $gallery]);
    }


    public function contato()
    {
        return view('pages.contato');
    }
}
