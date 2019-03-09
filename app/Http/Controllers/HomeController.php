<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class HomeController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		/*
		\Session::flash('info','Alert info');
		\Session::flash('success','Alert success');
		\Session::flash('warning','Alert warning');
		\Session::flash('danger','Alert danger');
		*/
		$view = \View::make('home');
		return $view;

	}
}
