<?php
declare(strict_types=1);
namespace App;

class App
{
   protected static Database $db;
   public function __construct($dsn, $dbname, $password)
   {
      static::$db = new Database($dsn, $dbname, $password);
   }

   public static function db(): Database
   {
      return static::$db;
   }
}