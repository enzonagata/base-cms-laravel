<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Categories();
    }

    public function index(Request $request)
    {
        return view(
            'admin.categories.index'
        );
    }

    //Listar todas as categorias
    public function readAll(Request $request)
    {
        $collection = $this->model->get()->all();
        $data['data'] = $collection;
        echo json_encode($data);
    }


    public function form(Request $request)
    {
        $id = $request->route('id');
        if (isset($id) and ($id != "")) {
            $entity = $this->model->find($id);
            return view('admin.categories.form', ['entity' => $entity]);
        } else {
            return view('admin.categories.form');
        }
    }

    public function save(Request $request)
    {

        $form = $request->all();
        $id = $request->route('id');

        //Verifica se possui algum registro
        if (!isset($id) and $id == "") {

            //Validação de URL
            $form['url'] = $this->url_verify($form['title'], $this->model);

            //Fazer inserção do produto
            $entity = $this->model->create($form);
            $res = [
                'status' => 200,
                'data' => $entity
            ];
        } else {
            //Fazer update do registro
            $entity = $this->model->find($id);
            //Validação de URL
            $form['url'] = $this->url_verify($form['title'], $this->model, $entity->id);

            $entity = $entity->update($form);
            $res = [
                'status' => 200,
                'data' => $entity
            ];
        }
        return response()->json($res);
    }

    public function delete(Request $request){
        $id = $request->route('id');
        $entity = $this->model->find($id);
        $entity->delete();
    }
}
