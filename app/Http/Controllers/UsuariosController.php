<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\Paginador as Paginador;
use Illuminate\Support\Facades\Input;

class UsuariosController extends Controller
{
	protected $userService;
	public $clasName = "UsuariosController.";

	public function __construct(UserService $userService)
	{
		$this->userService = $userService;
	}

	public function index(Request $request)
	{
		$method = "getData";

		$usuarios = null;
		$paginator = new Paginador();
		
		$inputs = Input::all();
		
		$params = new \stdClass();
		if ( isset($inputs['page']) ){
			$paginator->setPage($inputs['page']);
		}
		if ( isset($inputs['name']) ){
			$params->name=$inputs['name'];
		}
		
		try 
		{

			$usuarios = $this->userService->getDataList($params, $paginator);

			// info($usuarios->data);
			
			return view(
				'usuarios.index',
				[
					'rows' => $usuarios->data,
					'page' => $usuarios->currentPage,
					'totalRows' => $usuarios->totalRows,
					'totalPages' => $usuarios->totalPages
					]
				);

		} 
		catch (\Illuminate\Database\Eloquent\ModelNotFoundException $ex) 
		{
			\Log::error($this->clasName . $method);
			\Log::error($ex);
			$usuarios = null;
		} 
		catch (\Exception $ex) 
		{
			\Log::error($this->clasName . $method);
			\Log::error($ex);
			$usuarios = null;
		}

		if ($usuarios == null)
		{
			return view(
			'usuarios.index',
			[
				'rows' => null,
				'page' => null,
				'totalRows' => null,
				'totalPages' => null
				]
			);
		}
		

	}
}