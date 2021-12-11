<?php

namespace App\Http\Controllers;

use App\Mail\Classificados;
use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function email(Request $req)
    {
        $form = $req->all();
        $form['name'] = 'asdasda';
        Mail::to(['contato@apmpriopreto.com.br'])
            ->send(new Classificados($form, 'Formulário de Contato'));
        if (Mail::failures()) {
            echo '0';
            exit;
        }
        echo '1';
    }
}
