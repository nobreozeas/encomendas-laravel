<?php
namespace App\Helpers;

class Helper
{

    public static function formataDocumento($doc){
        $doc = str_replace('.', '', $doc);
        $doc = str_replace('-', '', $doc);
        $doc = str_replace('/', '', $doc);
        return $doc;
    }




}

