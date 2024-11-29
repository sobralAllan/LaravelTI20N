<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\modeloAgenda;

class registrarAtividadeController extends Controller
{
    public function index()
    {
        $dados = modeloAgenda::all();//Todos os dados do banco
        return view('paginas.cadastrar')->With('dados',$dados);
    }//fim do index

    public function store(Request $request)
    {
        $data = $request->input('dataEvento');
        $descricao = $request->input('descricaoTexto');

        $model = new modeloAgenda();
        $model->dataEvento = $data;
        $model->descricao  = $descricao;

        $model->save();//Armazenar no BD
        return redirect('/cadastrar');
    }//fim do store

    public function consultar()
    {
        $ids = modeloAgenda::all();
        return view('paginas.consultar',compact('ids'));
    }//fim do consultar

    public function editar($id)
    {
        $dado = modeloAgenda::findOrFail($id);
        return view('paginas.editar', compact('dado'));
    }//fim do editar

    public function atualizar(Request $request, $id)
    {
        modeloAgenda::where('id',$id)->update($request->all());
        return redirect('/consultar');
    }//fim do atualizar

    public function excluir(Request $request, $id)
    {
        modeloAgenda::where('id',$id)->delete($request->all());
        return redirect('/consultar');
    }//fim do excluir


}//fim da classe
