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
        }
        else{
            echo '<br>'.$data;
        }
        if($stop) exit( '<br><br>(string) Debug Stop... ');
    }
    
    /**
     * 
     */
    public static function getColor($i ='') {
        
        switch ($i){
            case 1: return '#FF0F00'; break;
            case 2: return '#FF6600'; break;
            case 3: return '#FF9E01'; break;
            case 4: return '#FCD202'; break;
            case 5: return '#F8FF01'; break;
            case 6: return '#B0DE09'; break;
            case 7: return '#04D215'; break;
            case 8: return '#0D8ECF'; break;
            case 9: return '#0D52D1'; break;
            case 10: return '#2A0CD0'; break;
            case 11: return '#8A0CCF'; break;
            case 12: return '#CD0D74'; break;
            default : return '#85C5E3'; break;
        }
        
    }


    
}