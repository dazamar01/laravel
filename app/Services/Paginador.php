<?php
namespace App\Services;
use \Illuminate\Pagination\Paginator;

class Paginador
{
  public $rowsPorPagina = 0;
  public $page = 1;

  public function __construct()
  {
    $this->page = 1;  // starts from 1
    $this->rowsPorPagina = 10;
  }

  public function setPage($page)
  {

    $this->page = $page;

    // set the current_page
    Paginator::currentPageResolver(function () use ($page) {
      return $page;
    });
  }
}

