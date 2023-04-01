<?php

namespace App;

use App\Database;

class Model
{


   protected Database $db;
   public function __construct()
   {
      $this->db = App::db();
   }
}