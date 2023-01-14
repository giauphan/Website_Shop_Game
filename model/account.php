<?php
 abstract class account
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