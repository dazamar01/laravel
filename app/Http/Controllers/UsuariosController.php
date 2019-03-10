<?php

namespace App\Http\Controllers;

use PHPUnit\Framework\Constraint\Exception;

use Illuminate\Http\Request;
use App\Services\UserService;
use \App\Http\Controllers\stdClass;
use App\Services\Paginador as Paginador;

class UsuariosController extends Controller
{
	protected $userService;
	public $clasName = "UsuariosController.";

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

	public function index()
	{
		$method = "getData";

		$usuarios = null;

		$paginator = new Paginador();
		$paginator->setPage(2);

		// $view = \View::make('usuarios.index');
		// return $view;
		try {
			$usuarios = $this->userService->getDataList('', $paginator);
		} catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) {
			\Log::error($this->clasName . $method);
			\Log::error($ex);
			$usuarios = null;
		} catch (\Exception $ex) {
			\Log::error($this->clasName . $method);
			\Log::error($ex);
			$usuarios = null;
		}

		return view(
			'usuarios.index',
			[
				'name' => $usuarios
			]
		);
	}
}

/*
\Session::flash('info','Alert info');
\Session::flash('success','Alert success');
\Session::flash('warning','Alert warning');
\Session::flash('danger','Alert danger');
*/
