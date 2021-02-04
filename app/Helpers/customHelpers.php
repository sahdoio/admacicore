<?php

use App\Models\MediaType;
use Illuminate\Support\Facades\Route;

if (!function_exists('formataQuantidade')) {
    function formataQuantidade($quantidade, $precision = 2)
    {
        return number_format((float)$quantidade, $precision, ',', '');
    }
}

/**
 * Active logic for menu navigation
 */
if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route_name, $output = 'active')
    {
        if (Route::currentRouteName() == $route_name) {
            return $output;
        }

        return '';
    }
}

/**
 * @return string
 */
if (!function_exists('getUploadPath')) {
    function getUploadPath()
    {
        $date = explode('/', date('d/m/Y'));
        $year = $date[2];
        $month = $date[1];

        return "uploads/$year/$month";
    }
}

/**
 * @param $string
 * @return int
 */
if (!function_exists('getOnlyNumbers')) {
    function getOnlyNumbers($string)
    {
        $res = preg_replace("/[^0-9]/", "", $string);
        return intval($res);
    }
}

/**
 * @param $extension
 * @return int
 */
if (!function_exists('getMediaTypeFromFileExtension')) {
    function getMediaTypeFromFileExtension($extension)
    {
        $extension = trim(strtolower($extension));
        $media_type = MediaType::GENERIC;

        switch ($extension) {
            case 'jpg':
            case 'jpeg':
                $media_type = MediaType::JPG;
                break;
            case 'png':
                $media_type = MediaType::PNG;
                break;
            case 'pdf':
                $media_type = MediaType::PDF;
                break;
            case 'mp4':
                $media_type = MediaType::MP4;
                break;
        }

        return $media_type;
    }
}

/**
 * @param $link
 * @return mixed
 */
if (!function_exists('videoInputFormat')) {
    function videoInputFormat($link)
    {
        $new_link = $link;
        if (str_contains($link, '//vimeo.com/')) {
            $new_link = str_replace('//vimeo.com/', '//player.vimeo.com/video/', $link);
        }

        return $new_link;
    }
}

/**
 * @param $link
 * @return int
 */
if (!function_exists('getVideoType')) {
    function getVideoType($link)
    {
        if (str_contains($link, 'vimeo'))
            $media_type = MediaType::VIMEO;
        elseif (str_contains($link, 'youtu'))
            $media_type = MediaType::YOUTUBE;
        else
            $media_type = MediaType::GENERIC;

        return $media_type;
    }
}

/**
 * @param $link
 * @return int
 */
if (!function_exists('getVideoCode')) {
    function getVideoCode($link)
    {
        if (str_contains($link, 'vimeo.com')) {
            $code = substr($link, strrpos($link, '/') + 1);
        } else if (str_contains($link, 'youtu')) {
            $code = substr($link, strrpos($link, '/') + 1);
            $code = str_replace('watch?v=', '', $code);
        } else {
            $code = null;
        }

        return $code;
    }
}

?>
