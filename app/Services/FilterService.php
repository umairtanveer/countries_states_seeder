<?php

namespace App\Services;


class FilterService
{
    /**
     * @param $string
     * @return string
     */
    public static function removeSpecialCharacters($string): string
    {
//        $string = preg_replace("/[^ \w]+/", '', $string);
//        $string = implode(',',array_unique(explode(',', $string)));
        $string = str_replace('~', '', $string);
        $string = str_replace('?', '', $string);
        $string = str_replace("¶", '', $string);
        $string = str_replace("¥", '', $string);
        $string = str_replace("¤", '', $string);
        $string = str_replace(' (en)', '', $string);
        return $string;
    }
}
