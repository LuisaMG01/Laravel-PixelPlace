<?php

namespace App\Util;

class JsonParser
{
    public static function parseStrToJson(string $str)
    {
        $array = explode(',', $str);
        $json = json_encode($array);

        return $json;
    }
}   