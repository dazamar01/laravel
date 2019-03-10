<?php
namespace App\Services;

use App\User as UserModel;
use PHPUnit\Framework\Constraint\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
// 
use App\Services\DataTransfer as Transfer;

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
    /*
		info('Readed paginador');
    info((array)$paginador);
    
		info('Readed parameters');
    info((array)$params);
    */

    $method = "getData";
    $logParams = " Params: -> [  ]";
    
    $data = null;

    try {

      // \Log::info($this->clasName . $method);
      
      $totalRegistros = 0;

      $rawData = UserModel::where('activo', 1)
        ->orderBy('username', 'asc')
        ->paginate($paginador->rowsPorPagina)->toArray();
      
      $totalRegistros = UserModel::where('activo','=','1')->count();

        // info('$rawData');
        // info($rawData);

        // current_page
        // data
        // total

      if (!$rawData) {
        throw new ModelNotFoundException("Data not found | " . $this->clasName . $method . "\n" . $logParams);
      }

      $data = new Transfer();
      $data->setData($rawData['data'],$totalRegistros,$paginador->getCurrentPage());
      
    } catch (ModelNotFoundException $ex) {
      \Log::warning($ex->getMessage());
      // throw $ex;
      $data = null;
    } catch (Exception $ex) {
      \Log::error("Exception | " . $this->clasName . $method . $logParams);
      throw $ex;
    }

    return $data;
  }
}


// return $credentials;
