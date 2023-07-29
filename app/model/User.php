<?php   

namespace App\model;
use App\master\model;

class User extends Model{
  private $table = "user";
  public function all(): array|false
  {
   return $this->fetchall($this->table);
  }
  public function byId(string $schema,string $column,string $data)
  {
   return $this->fetchById($schema,$column,$data);
  }

  public function isExists(string $data)
  {
   return $this->exists("users","username",$data);
  }

}