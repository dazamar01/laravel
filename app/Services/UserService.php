<?php
namespace App\Services;

use App\User as UserModel;
use PHPUnit\Framework\Constraint\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// use App\Services\Paginador as Paginador;

/*
\Log::info('This is some useful information.');
\Log::warning('Something could be going wrong.');
\Log::error('Something is really going wrong.');
*/

class UserService
{
  public $clasName = "UserService.";
  /*
  Sould receive 
    - Params        -> {busqueda}
    - Pagintacion   -> { App\Services\Paginador }
    */
  public function getDataList($params, $paginador)
  {
    info((array)$paginador);
    
    $method = "getData";
    $errorContext = " Context: -> [  ]";

    $data = null;

    try {

      \Log::info($this->clasName . $method);
      
      $users = UserModel::where('activo', 1)
        ->orderBy('username', 'asc')
        ->paginate($paginador->rowsPorPagina);
      //->get();

      info("users");
      info($users);

      if (!$users) {
        throw new ModelNotFoundException("Data not found | " . $this->clasName . $method . "\n" . $errorContext);
      }
    } catch (ModelNotFoundException $ex) {
      \Log::warning($ex->getMessage());
      // throw $ex;
      $data = null;
    } catch (Exception $ex) {
      \Log::error("Exception | " . $this->clasName . $method . $errorContext);
      throw $ex;
    }



    return $data;
  }
}


// return $credentials;
