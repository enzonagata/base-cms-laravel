<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Contents;
use App\Models\ContentsImages;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new Contents();
    }

    public function index(Request $request)
    {
        //Pega o tipo de conteudo que vou gerenciar
        $_type = $request->route('_type');

        return view(
            'admin.content.' . $_type . '.index', ['_type' => $_type]
        );
    }

    //Listar todas as categorias
    public function readAll(Request $request)
    {
        $type = $request->route('_type');
        $collection = $this->model->where('type', '=', $type)->get()->all();

        $data['data'] = $collection;
        echo json_encode($data);
    }

    public function form(Request $request)
    {

        $_type = $request->route('_type');

        //Verifica se a existe a página do tipo
        if ($request->route('id') !== null) {
            $id = $request->route('id');
        } else if($request->route('id') !== null and $_type!=null) {
            $load_entity = Contents::where('type', '=', $_type)->get()->first();
            if ($load_entity !== null) {
                $id = $load_entity->id;
            }

        }
        

        if (isset($id) and ($id != "")) {

            $entity = $this->model->with(['categories'])->find($id);

            $gallery = $entity->images()->get();

            $categories = Categories::with(['contents' => function ($q) use ($id) {
                $q->where('id', $id);
            }])->get();

            return view('admin.content.' . $_type . '.form', [
                'entity' => $entity,
                'categories' => $categories,
                'gallery' => $gallery,
                '_type' => $_type,
            ]);
        } else {
            $categories = Categories::orderBy('title', 'ASC')->get();
            return view('admin.content.' . $_type . '.form', ['categories' => $categories, '_type' => $_type]);
        }
    }

    public function save(Request $request)
    {

        $folder = public_path() . '/content/';
        $form = $request->all();
        $id = $request->route('id');

        //Verifica se a pasta de conteudo á existe, se nao existir, a cria.
        if (!file_exists($folder)) {
            mkdir($folder, 0777);
        }

        $form['title'] = $form['title'] ?? date('dmyhis');

        //Inserir novo registro
        if (!isset($id) and $id == "") {

            //Gera a url amigável
            $form['url'] = $this->url_verify($form['title'], $this->model);

            //Fazer inserção do produto
            if ($entity = $this->model->create($form)) {

                //Cria a pasta de acordo com o conteudo criado
                $folder_content = $folder . '/' . $entity->id . '/'; //Pasta referencia ao conteudo criado
                $folder_gallery = $folder_content . '/gallery/'; //Pasta da Galeria
                $folder_thumb = $folder_content . '/thumb/'; // Pasta da  MIniatura de Galeria

                //Cria todas as pastas para o conteudo
                if (!file_exists($folder_content)) {
                    if (mkdir($folder_content, 0777)) { //Cria a pasta inicial
                        if (mkdir($folder_gallery, 0777)) { //Cria a pasta da galeria
                            mkdir($folder_thumb, 0777); // Cria a pasta de Miniaturas
                        }
                    }
                }

                //Gera um novo nome de arquivo
                if ((isset($form['base64']) and ($form['base64'] != ""))) {
                    //Função para salvar e pegar o nome do arquivo de imagem
                    $image_name = $this->get_image_base64($form['base64'], function ($img, $name) use ($folder_content) {
                        file_put_contents($folder_content . $name, $img);
                        return $name;
                    });
                    $update['image'] = $image_name;
                    $entity->update($update);
                }

                //Remove a image do banco de dados
                if (isset($form['remove_image_default']) and $form['remove_image_default'] == 1) {
                    $update['image'] = '';
                    $entity->update($update);
                }

                //Cadastro de fotos na galeria de imagens
                if (isset($form['gallery_image'])) {
                    foreach ($form['gallery_image'] as $key => $image) {

                        $image_description = $form['gallery_image_description'][$key]; //Pega o valor do array da descricao da imagem da galeria
                        $image_thumb = $form['gallery_image_thumb'][$key]; //Pega o valor do array da miniatura da imagem

                        //Salva as imagens principais
                        $image_name_principal = $this->get_image_base64($image, function ($img, $name) use ($folder_gallery) {
                            file_put_contents($folder_gallery . $name, $img);
                            return $name;
                        });

                        //Salva as imagens miniaturas
                        $image_name_thumb = $this->get_image_base64($image_thumb, function ($img, $name) use ($folder_thumb, $image_name_principal) {
                            file_put_contents($folder_thumb . $image_name_principal, $img);
                            return $image_name_principal;
                        });

                        //Informaçoes necessárias para inserçao
                        $image_data = [
                            'description' => $image_description,
                            'type' => 'gallery',
                            'order' => '0',
                            'image' => $image_name_principal,
                            'path' => $folder_content,
                        ];

                        $entity->images()->create($image_data);

                    }
                }

                //Cadastrar as categorias
                if (isset($form['categories']) > 0) {
                    foreach ($form['categories'] as $category) {
                        $entity->categories()->attach($category);
                    }
                }

                $res = [
                    'status' => 200,
                    'data' => $entity,
                ];

            } else {
                $res = [
                    'status' => 500,
                    'data' => $entity,
                ];
            }

        } else {
            //Atualizar o registro
            $entity = $this->model->find($id);

            //Gera a url amigável
            $form['url'] = $this->url_verify($form['title'], $this->model, $id);

            //Cria a pasta de acordo com o conteudo criado
            $folder_content = $folder . '/' . $entity->id . '/'; //Pasta referencia ao conteudo criado
            $folder_gallery = $folder_content . '/gallery/'; //Pasta da Galeria
            $folder_thumb = $folder_content . '/thumb/'; // Pasta da  MIniatura de Galeria

            //Cria todas as pastas para o conteudo
            if (!file_exists($folder_content)) {
                if (mkdir($folder_content, 0777)) { //Cria a pasta inicial
                    if (mkdir($folder_gallery, 0777)) { //Cria a pasta da galeria
                        mkdir($folder_thumb, 0777); // Cria a pasta de Miniaturas
                    }
                }
            }
            if ($entity->update($form)) {

                //Gera um novo nome de arquivo
                if ((isset($form['base64']) and ($form['base64'] != "")) and ($form['remove_image_default'] != 1)) {
                    //Remover a imagem antiga
                    @unlink($folder_content . $entity->image);
                    //Função para salvar e pegar o nome do arquivo de imagem
                    $image_name = $this->get_image_base64($form['base64'], function ($img, $name) use ($folder_content) {
                        file_put_contents($folder_content . $name, $img);
                        return $name;
                    });
                    $update['image'] = $image_name;
                    $entity->update($update);
                }

                //Remove a image do banco de dados
                if (isset($form['remove_image_default']) and $form['remove_image_default'] == 1) {
                    //remove o arquivo da imagem
                    @unlink($folder_content . $entity->image);
                    $update['image'] = '';
                    $entity->update($update);
                }

                //Cadastro de fotos na galeria de imagens
                if (isset($form['gallery_image'])) {
                    foreach ($form['gallery_image'] as $key => $image) {

                        $image_description = $form['gallery_image_description'][$key]; //Pega o valor do array da descricao da imagem da galeria
                        $image_thumb = $form['gallery_image_thumb'][$key]; //Pega o valor do array da miniatura da imagem

                        //Salva as imagens principais
                        $image_name_principal = $this->get_image_base64($image, function ($img, $name) use ($folder_gallery) {
                            file_put_contents($folder_gallery . $name, $img);
                            return $name;
                        });

                        //Salva as imagens miniaturas
                        $image_name_thumb = $this->get_image_base64($image_thumb, function ($img, $name) use ($folder_thumb, $image_name_principal) {
                            file_put_contents($folder_thumb . $image_name_principal, $img);
                            return $image_name_principal;
                        });

                        //Informaçoes necessárias para inserçao
                        $image_data = [
                            'description' => $image_description,
                            'type' => 'gallery',
                            'order' => '0',
                            'image' => $image_name_principal,
                            'path' => $folder_content,
                        ];

                        $entity->images()->create($image_data);
                    }
                }

                //Atualizar descricao das imagens
                if (isset($form['gallery_image_update_id'])) {
                    foreach ($form['gallery_image_update_id'] as $key => $image_update_id) {
                        $image_entity = ContentsImages::find($image_update_id);

                        $image_update_data = [
                            'description' => $form['gallery_image_update_description'][$key],
                        ];

                        $image_entity->update($image_update_data);
                    }
                }

                if (isset($form['categories']) > 0) {
                    //Remove todas as categorias e adiciona novamente
                    $entity->categories()->detach();
                    //Adiciona novamente as categorias
                    foreach ($form['categories'] as $category) {
                        $entity->categories()->attach($category);
                    }
                }

                //remover imagens selecionadas
                if (isset($form['image_gallery_remove'])) {
                    foreach ($form['image_gallery_remove'] as $image_remove_id) {
                        $gallery_entity = ContentsImages::find($image_remove_id);
                        //Apaga as imagens
                        @unlink($folder_gallery . $gallery_entity->image);
                        @unlink($folder_thumb . $gallery_entity->image);
                        $gallery_entity->delete();
                    };
                }

                $res = [
                    'status' => 200,
                    'data' => $entity,
                ];
            }
        }
        return response()->json($res);
    }

    public function delete(Request $request)
    {
        $id = $request->route('id');
        $entity = $this->model->find($id);

        //remover todas as categorias para apagar
        $entity->categories()->detach();

        //Define as pastas de todas as fotos
        $folder = public_path() . '/content/';
        $folder_content = $folder . '/' . $entity->id . '/'; //Pasta referencia ao conteudo criado
        $folder_gallery = $folder_content . '/gallery/'; //Pasta da Galeria
        $folder_thumb = $folder_content . '/thumb/'; // Pasta da  MIniatura de Galeria

        //Pega todas as imagens atrelladas ao conteudo
        $gallery = $entity->images()->get();
        foreach ($gallery as $item) {
            echo $item->image;
            @unlink($folder_gallery . $item->image);
            @unlink($folder_thumb . $item->image);
            $item->delete();
        }

        if ($entity->delete()) {
            @unlink($folder_content . '/' . $entity->image);
            @unlink($folder_content);
        }
    }
}
