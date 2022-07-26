<?php
namespace App\Helpers;

class DateHelper{
    
    public static function dateFormat($format='Y-m-d'){
        return date($format);
    }

    public static function dateFormatIndonesia(){
        return date('d-m-Y');
    }

}