<?php

namespace App\Models;

use App\Models\database;

class convert extends database
{

    public function saveFille($fileName,$Filetype,$Filesize)
    {
        $sql = 'INSERT INTO `file`( `fileName`, `Filetype`, `Filesize`) VALUES (?,?,?)';
        $this->pdo_execute($sql,$fileName,$Filetype,$Filesize);
    }
    public function saveCovert($ConversionTypeName,$ConversionType,$NumbeofConvert,$DayConvertType,$FileID,$UserID)
    {
        $sql = 'INSERT INTO `convert`( `ConversionTypeName`, `ConversionType`, `NumbeofConvert`, `DayConvertType`, `FileID`, `UserID`) VALUES (?,?,?,?,?,?)';
        $this->pdo_execute($sql,$ConversionTypeName,$ConversionType,$NumbeofConvert,$DayConvertType,$FileID,$UserID);
    }
}
