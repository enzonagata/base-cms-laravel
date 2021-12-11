<?php

namespace App\Http\Controllers;

use App\Informations;
use Illuminate\Http\Request;

class InformationsController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Informations();
    }
    public function index()
    {
        $entity = $this->model->get()->first();
        
        return view('admin.informations', [
            'entity' => $entity
        ]);
    }

    public function save(Request $request)
    {
        //print_r($request->all());
        $form = $request->all();
        //Verifica se possui algum registro
        $entity = $this->model->get()->first();

        if (!isset($entity)) {
            $entity = $this->model->create($form);
            $res = [
                'status' => 200,
                'data' => $entity
            ];
        } else {
            $entity = $entity->update($form);
            $res = [
                'status' => 200,
                'data' => $entity
            ];
        }
        return response()->json($res);
    }
}
