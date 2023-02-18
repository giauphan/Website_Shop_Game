<?php

namespace App\Models\admin;

use App\Models\database;

class historyRechargeModel extends database
{
    function history_recharge()
    {
    

        $sql = "SELECT * FROM `lich_su_nap` join user on id_user = user.ma_kh";
        $query = $this->pdo_query($sql);

        return $query;
    }
}
