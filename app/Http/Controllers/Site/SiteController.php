<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
    	return view('todo.lista.index');
    }
     public function salvar(Request $req)
    {
    	$dado = $req->all();
    	
    	Site::create($dado);

      return view('todo.lista.index');
    }

}
