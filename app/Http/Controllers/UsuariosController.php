<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;

class UsuariosController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        /*
		\Session::flash('info','Alert info');
		\Session::flash('success','Alert success');
		\Session::flash('warning','Alert warning');
		\Session::flash('danger','Alert danger');
        */

        // $view = \View::make('usuarios.index');
        // return $view;
        $result = $this->userService->getData('','');

        return view(
            'usuarios.index',
            [
                'name' => $result
            ]
        );
    }
}
