<?php


namespace App\Controllers\Admin;

use App\model\User;

class HomeController
{

  private bool $errorCheck = false;
  public function about()
  {
    $data=[];
    return view("pages/Admin/Static/homeAbout.php", compact("data"));
  }
}