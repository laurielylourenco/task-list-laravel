<?php

Route::get('/',['as'=>'todo.index',
  	'uses'=>'Site\TaskController@index']);

Route::post('/salvar',['as'=>'todo.salvar',
    'uses'=>'Site\TaskController@salvar']);

Route::get('/listar',['as'=>'todo.listar',
    'uses'=>'Site\TaskController@listar']);

Route::get('/editar/{id}',['as'=>'todo.editar',
	'uses'=>'Site\TaskController@editar']);

  Route::put('/atualizar/{id}',['as'=>'todo.atualizar',
  	'uses'=>'Site\TaskController@atualizar']);

  Route::get('/deletar/{id}',['as'=>'todo.deletar',
  	'uses'=>'Site\TaskController@deletar']);
  