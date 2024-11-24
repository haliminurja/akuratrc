<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class Costum
{

    public static function strip_tags_content($string)
    {
        // ----- remove HTML TAGs -----
        $string = preg_replace('/<[^>]*>/', ' ', $string);
        // ----- remove control characters -----
        $string = str_replace("\r", '', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        // ----- remove multiple spaces -----
        return trim(preg_replace('/ {2,}/', ' ', $string));
    }

    public static function generateURL($string)
    {
        $url = str_replace(' ', '-', $string);
        $url = strtolower($url);
        $url = preg_replace('/[^a-z0-9-]/', '', $url);
        $url = preg_replace('/-+/', '-', $url);
        $url = trim($url, '-');
        return $url;
    }

    public static  function removeExtension($url)
    {
        $extensions = ['.html', '.htm', '.php'];
        $path = parse_url($url, PHP_URL_PATH);
        foreach ($extensions as $extension) {
            if (Str::endsWith($path, $extension)) {
                $path = Str::beforeLast($path, $extension);
                return str_replace(parse_url($url, PHP_URL_PATH), $path, $url);
            }
        }

        return $url;
    }
}
