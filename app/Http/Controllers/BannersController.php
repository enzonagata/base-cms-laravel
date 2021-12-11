<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannersController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Banners();
    }

    public function index(Request $request)
    {
        return view(
            'admin.banners.index'
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
            return view('admin.banners.form', ['entity' => $entity]);
        } else {
            return view('admin.banners.form');
        }
    }

    public function save(Request $request)
    {

        $form = $request->all();
        $id = $request->route('id');

        $destination_path = public_path() . '/banners';
        //Verifica se a pasta existe, se não existir, a cria
        if (!file_exists($destination_path)) {
            mkdir($destination_path, 0777);
        }

        //Gera um novo nome de arquivo
        if (isset($form['base64']) and ($form['base64'] != "")) {
            $image = $form['base64'];
            preg_match('/data:([^;]*);base64,(.*)/', $image, $matches);
            $type = explode('/', $matches[1]);
            $extension = $type[1];
            $filename = uniqid('banner_') . '.' . $extension;

            $file = public_path() . '/banners/' . $filename;
            $photobase = explode(',', $image);
            $photo = base64_decode($photobase[1]);

            //Adiciona para a insercao do banner
            $form['image'] = $filename;
        }

        //Verifica se possui algum registro
        if (!isset($id) and $id == "") {

            //Fazer inserção do produto
            if ($entity = $this->model->create($form)) {
                file_put_contents($file, $photo);
            }

            $res = [
                'status' => 200,
                'data' => $entity,
            ];
        } else {
            //Fazer update do registro
            $entity = $this->model->find($id);
            $image_old = $entity->image;

            if ($entity = $entity->update($form)) {
                if ($form['base64'] != "") {
                    unlink($destination_path . '/' . $image_old);
                    file_put_contents($file, $photo);
                }
            }

            $res = [
                'status' => 200,
                'data' => $entity,
            ];
        }
        return response()->json($res);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $entity = $this->model->find($id);
        $image_old = $entity->image;

        $destination_path = public_path() . '/banners';

        if ($entity->delete()) {
            @unlink($destination_path . '/' . $image_old);
        }
    }
}
