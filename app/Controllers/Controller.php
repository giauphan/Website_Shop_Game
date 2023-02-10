<?php

namespace App\Controllers;

use App\Models\admin\export;

session_start();
class Controller
{

    public function export_excel()
    {
        $file = new export();
        // SELECT JSON_ARRAYAGG(JSON_OBJECT("column1", column1, "column2", column2, ...))
        // FROM table_name;
        //excel  
        //       SELECT * INTO OUTFILE '/path/to/file.csv'
        // FIELDS TERMINATED BY ','
        // ENCLOSED BY '"'
        // LINES TERMINATED BY '\n'
        // FROM table_name;

        // $file = "/game.txt";
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $mydate = getdate(date("U"));
        $today = "$mydate[year]/$mydate[mon]/$mydate[mday]  $mydate[hours]:$mydate[minutes]:$mydate[seconds]";
        $files = "/assets/dowload/";
        $files .= $file->export_excel($today, $_SESSION['ma_user']);

        if (file_exists($files)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($files) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($files));
            readfile($files);
            exit;
        } else {
            header("HTTP/1.0 404 Not Found");
            echo "<h1>404 Not Found</h1>";
            echo ' <a href="/' . $files . '">test</a>';
            echo "The file <b>" . $files . "</b> was not found on this server.";
            exit;
        }
    }
}
