<?php
namespace App\Services;

use App\Services\Paginador as Paginador;

class DataTransfer
{
  public $rowsPorPagina = 10;

  public $data = [];
  public $totalRows = 0; // total amount of data
  public $currentPage = 1;
  public $totalPages = 0;

  public function setData($data, $totalRows, $currentPage)
  {
    $this->data = [];
    $this->currentPage = $currentPage;
    $this->totalRows = $totalRows;

    $this->totalPages = 0;

    if ($totalRows > 0) {

      // $this->data = json_encode($data);
      $this->data = $data;

      $pagina = new Paginador();
      $this->totalPages = intval($totalRows / $pagina->getRowsPorPagina());
      $totalPages = $totalRows / $pagina->getRowsPorPagina();
      if ($this->totalPages != $totalPages) {
        $this->totalPages++;
      }

    }
  }
}
