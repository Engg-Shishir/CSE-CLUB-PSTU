<?php   

namespace App\model;
use App\master\model;

class User extends Model{
  private $table = "users";

  public function byId(string $schema,string $column,string $data)
  {
   return $this->fetchById($schema,$column,$data);
  }

  public function isExists(string $data)
  {
   return $this->exists("users","username",$data);
  }

  public function isExist(string $table,string $column,string $data)
  {
   return $this->exists($table,$column,$data);
  }

  public function updates(string $query, array $BindParams = [])
  {
    return $this->updateTable($query,$BindParams);
  }

}