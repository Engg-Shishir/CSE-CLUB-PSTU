<?php

namespace App\Master;

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


  public function fetchById(string $table,string $column,string $data):mixed
  {
    $sql = "SELECT * FROM {$table} WHERE $column=?";
    $stmt = $this->execute($sql,[$data]);
    $response = $stmt->fetch();
    return $response;
  }
}