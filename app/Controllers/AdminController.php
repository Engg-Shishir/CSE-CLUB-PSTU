<?php  


namespace App\Controllers;
use App\model\User;

class AdminController
{
  public function index(){
    return view("pages/Admin/Dashboard/index.php");
  }
}