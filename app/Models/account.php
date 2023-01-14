<?php
namespace App\Models\account;

use App\Models\Model;

 abstract class account  extends Model
 {
     public $db;
 
     public function __construct()
     {
         $this->db = new database;
     }
   abstract  public function get_money();


   
     public function  __destruct()
     {
         $this->db = "";
     }

    }