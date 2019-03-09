<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
	{
		/*
		\Session::flash('info','Alert info');
		\Session::flash('success','Alert success');
		\Session::flash('warning','Alert warning');
		\Session::flash('danger','Alert danger');
        */
        
		$view = \View::make('usuarios.index');
		return $view;

	}
}
