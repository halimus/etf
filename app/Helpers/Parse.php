<?php

namespace App\Helpers;

class Parse {

    
    /**
     * 
     * @param type $dom
     * @return type string
     */
    public static function getName($dom) {
        $element = $dom->getElementById("ticker");
        if (!empty($element)) {
            $etf_name = trim($element->nodeValue);
            if (!empty($etf_name)) {
                return $etf_name;
            }
        }
        return null;
    }
    
    /**
     * 
     * @param type $dom
     * @return type string
     */
    public static function getDescription($dom) { 
        $element = $dom->getElementById("breadcrumb");
        $description = trim($element->nodeValue);
        $description = str_replace('Home » ETFs :', '', $description);
        $description = trim($description);

        if (!empty($description)) {
            return htmlspecialchars($description);
        }
        return null;
    }
    
    /**
     * 
     * @param type $xpath
     * @return type date mm/dd/yyyy
     */
    public static function getDate($xpath) {
        $query = '//div[@class="as-of stacked"]';
        $date = $xpath->query($query)->item(0)->nodeValue;
        if(!empty($date)){
           $date = str_replace('As of', '', $date);
           return trim($date); 
        }
        return null;
    }
    
    /**
     * 
     * @param type $xpath
     * @return type array 
     */
    public static function getTopHolding($xpath) {
        $top_holding = array();
        
        $query = '//div[@id="holdings"]//table';
        
        $table_holding  = $xpath->query($query)->item(0);
        $rows = $table_holding->getElementsByTagName("tr");

        $index = 0;
        foreach($rows as $row){
            $cells = $row->getElementsByTagName('td');
            $i=0; 
            foreach ($cells as $cell) {
               if($i==0){
                   $top_holding[$index]['holding_name'] = trim($cell->nodeValue);
               }
               elseif($i==1){
                   $top_holding[$index]['weight'] = trim(str_replace('%', '', $cell->nodeValue));
                   $index++;
               }
               else{ break;}
               $i++;
            }
        } 
        return $top_holding;
        
    }
    
    /**
     * 
     * @param type $xpath
     * @return type array 
     */
    public static function getSector($xpath) {
        $sector = array();
        $query = '//div[@id="chart_SectorsAllocChart"]/following-sibling::*[1]';

        $div_sector = $xpath->query($query)->item(0)->nodeValue;
        $xml_object = simplexml_load_string($div_sector);  //Interprets a string of XML into an object
        $xml_array = self::object2array($xml_object); 
        
        $date = $xml_array['asOfDate'];
        $attribute = $xml_array['attributes']['attribute'];
        
        $i=0;
        foreach ($attribute as $key => $value) {
            $sector[$i]['sector_name'] = trim($value['label']);
            $sector[$i]['weight'] = trim($value['rawValue']);
            $sector[$i]['order_num'] = trim($value['order']);
            $i++;
        }
        
        return $sector;
    }
    
    /**
     * 
     * @param type $xpath
     * @return type array 
     */
    public static function getCountry($xpath) {
        $country = array();
        $query = '//div[@id="holdings"]//table';

        $table_country = @$xpath->query($query)->item(2);
        if(!empty($table_country)){
            $rows = $table_country->getElementsByTagName("tr");
        
            $index = 0;
            foreach($rows as $row){
                $cells = $row->getElementsByTagName('td');
                $i=0; 
                foreach ($cells as $cell) {
                   if($i==0){
                       $country[$index]['country_name'] = trim($cell->nodeValue);
                   }
                   elseif($i==1){
                       $country[$index]['weight'] = trim(str_replace('%', '', $cell->nodeValue));
                       $index++;
                   }
                   else{ break;}
                   $i++;
                }
            } 
        }
        return $country;
    }
    
    /**
     * 
     * @param type $object
     * @return array
     */
    public static function object2array($object) { 
        return @json_decode(@json_encode($object), 1); 
    } 

}