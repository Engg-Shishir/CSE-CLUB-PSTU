<?php  


namespace App\Controllers;
use App\model\User;

class AdminController
{
  public function adminDashboard(){
    return view("pages/Admin/Dashboard/index.php");
  }
}