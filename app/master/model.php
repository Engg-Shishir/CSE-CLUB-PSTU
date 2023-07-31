<?php

namespace App\Master;

use App\model\User;
use Exception;
use PDOException;

class Model
{
  public function __construct()
  {
    $this->connect();
  }

  public function connect():\PDO
  {
    try {
      $DB_HOST = shishirEnv("DB_HOST");
      if (empty($DB_HOST))
        throw new Exception("Please Provide Database Host name");
      $DB_NAME = shishirEnv("DB_NAME");
      if (empty($DB_NAME))
        throw new Exception("Please Provide Database name");
      $DB_PORT = shishirEnv("DB_PORT");
      if (empty($DB_PORT))
        throw new Exception("Please Provide Database Port No");
      $DB_USER = shishirEnv("DB_USER");
      if (empty($DB_USER))
        throw new Exception("Please Provide Database USer name");
      $DB_PASSWORD = shishirEnv("DB_PASSWORD");

            /**
       * @author Shishir Bhuiyan <shishir.cse.pstu@gmail.com>
       * Mysql PDO Connection
       * 
       * @param $hostname
       * @param $dbname 
       * @param $dbportname 
       * @param $dbusername 
       * @param $dbpassword 
       * 
       * 
       */
      return new \PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;port=$DB_PORT", $DB_USER, $DB_PASSWORD);

    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage() . "<br/>";
      die();
    }
  }


  public function execute(string $query, array $BindParams = []) : \PDOStatement|false
  {
    $pdo = $this->connect();
    $stmt =$pdo->prepare($query);

    $stmt->execute($BindParams);
    return $stmt;
  }


  public function fetchall(string $table,array $BindParams = []) : array|false
  {
    $sql = "SELECT * FROM {$table}";
    $stmt = $this->execute($sql,$BindParams);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function allexcept(string $table,string $colName,string $colVal)
  {
    $sql = "SELECT * FROM {$table} WHERE $colName !=:colName";
    $BindParams = [
      ":colName"=>$colVal
    ];

    $stmt = $this->execute($sql,$BindParams);
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }


  public function fetchById(string $table,string $column,string $data)
  {
    $sql = "SELECT * FROM {$table} WHERE $column=?";
    $stmt = $this->execute($sql,[$data]);
    $response = $stmt->fetch();
    return $response;
  }

  public function delete(string $table,string $column,string $data)
  {
    $sql = "DELETE FROM {$table} WHERE $column=?";
    $stmt = $this->execute($sql,[$data]);
    $response = $stmt->fetch();
    return $response;
  }

  public function exists(string $table, string $column, string $data)
  {
    $sql = "SELECT * FROM {$table} WHERE $column=?";
    $stmt = $this->execute($sql, [$data]);
    if($stmt->rowCount() > 0) return true;
    return false;
  }

  public function insert(string $query, array $BindParams = [])
  {
    $pdo = $this->connect();
    $stmt = $pdo->prepare($query);
    foreach ($BindParams as $key => &$value){
      if($key != "cpassword") $stmt->bindParam(':'.$key, $value);
    }
    
   $run =  $stmt->execute();
   return $run;
  }

  public function updateTable(string $query, array $BindParams = [])
  {
    $pdo = $this->connect();
    $stmt = $pdo->prepare($query);
    foreach ($BindParams as $key => &$value){
      $stmt->bindParam(':'.$key, $value);
    }
    return $stmt->execute();
  }
}