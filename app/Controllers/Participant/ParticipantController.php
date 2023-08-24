<?php


namespace App\Controllers\Participant;

use App\model\User;

class ParticipantController
{
  public function dashboard()
  {
    $user = new User();
    $settings = $user->settings();
    return view("Backend/Participant/Dashboard.php", compact("settings"));
  }

}