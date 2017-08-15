<?php

namespace App\Helpers;

class Tools {

    
    /**
     * 
     * @param type $data
     * @param type $stop
     */
    public static function message($data ='', $stop = false) {
        if(is_array($data)){
            echo '<pre>';
            print_r($data);
            echo '</pre>';
            die('xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
        }
        else{
            echo '<br>'.$data;
            die('cccc');
        }
        if($stop) exit( '<br><br>(string) Debug Stop... ');
    }


    
}