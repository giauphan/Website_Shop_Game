<?php
namespace App\Models;
use App\Models\Model as ModelsModel;

class muahang extends ModelsModel
{
    public $db;
    public function __construct()
    {
        $this->db = new database;
    }
    public function show_bill()
    {
        $showtien = 'SELECT * FROM `donhang` where ma_kh = "' . $_SESSION['ma_user'] . '" ';
        return $this->db->pdo_query($showtien);
    }
}
