<?php

namespace Core;

class View
{
   
    
        public static function render($view, $data = [])
        {
            extract($data);
            ob_start();
         
            include_once __DIR__ . "/../app/views/$view.php";
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    
    
    
    
}