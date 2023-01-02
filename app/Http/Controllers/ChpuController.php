<?php

namespace App\Http\Controllers;

class ChpuController
{
 public static function chpuGenerate($string)
 {
     $translit = [
         'а' => 'a',
         'б' => 'b',
         'в' => 'v',
         'г' => 'g',
         'д' => 'd',
         'е' => 'e',
         'ё' => 'e',
         'ж' => 'zh',
         'з' => 'z',
         'и' => 'i',
         'й' => 'j',
         'к' => 'k',
         'л' => 'l',
         'м' => 'm',
         'н' => 'n',
         'о' => 'o',
         'п' => 'p',
         'р' => 'r',
         'с' => 's',
         'т' => 't',
         'у' => 'u',
         'ф' => 'f',
         'х' => 'h',
         'ц' => 'ts',
         'ч' => 'ch',
         'ш' => 'sh',
         'щ' => 'shch',
         'ъ' => '',
         'ы' => 'y',
         'ь' => '',
         'э' => 'e',
         'ю' => 'yu',
         'я' => 'ya',
         ' ' => '-',
         '"' => '',
         '.' => '',
         '@' => '',
         '&' => '',
         '?' => '',
         '«' => '',
         '»' => '',
     ];

     $string = mb_strtolower($string);
     return strtr($string, $translit);
 }

}
