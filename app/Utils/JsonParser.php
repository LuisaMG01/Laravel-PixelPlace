<?php

namespace App\Utils;

class JsonParser
{
    public static function parseStrToJson(string $str): string
    {
        $array = explode(',', $str);
        $json = json_encode($array);

        return $json;
    }
}
