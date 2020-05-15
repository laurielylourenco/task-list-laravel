<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Todo;
class TaskController extends Controller
{
  public function index()
  {
    return view('todo.lista.index');
  }
  public function salvar(Request $req)
  {
    $dado = $req->all();
    $this->validate($req, [
      'titulo' => 'required',
      'texto' => 'required',
    ]);
      if($dado){
        Todo::create($dado);
        $dado['message'] = '<h5 class="green darken-1">Nova tarefa!</h5>';
        return response()->json($dado);    
      }     
  }

  public function listar()
  {
     $list = Todo::all();

      return view('todo.lista.listagem',compact('list'));
  }

  public function editar($id)
  {
    $edit = Todo::find($id);
    return view('todo.lista.editar', compact('edit'));
  }

  public function atualizar(Request $req, $id)
  {
     $dado = $req->all();
    
      Todo::find($id)->update($dado);

      return redirect()->route('todo.listar');
  
  }

  public function deletar($id)
  {
    $dado = Todo::find($id);
    $dado->delete();
     return response()->json($dado);
    //Todo::find($id)->delete();
    //return redirect()->route('todo.listar');
   
  }

}
