<?php namespace Spescina\Timthumb;

use Config;

define ('DEBUG_ON', Config::get('timthumb.debug_on'));
define ('DEBUG_LEVEL', Config::get('timthumb.debug_level'));
define ('FILE_CACHE_ENABLED', Config::get('timthumb.file_cache_enabled'));
define ('FILE_CACHE_DIRECTORY', Config::get('timthumb.file_cache_directory'));
define ('NOT_FOUND_IMAGE', Config::get('timthumb.not_found_image'));
define ('ERROR_IMAGE',  Config::get('timthumb.error_image'));
define ('PNG_IS_TRANSPARENT', Config::get('timthumb.png_is_transparent'));


require_once("TimthumbExt.php");

class Timthumb {
        static function get($src,$w = 0,$h = 0,$zc = 3) {
            $allowedSites = Config::get('timthumb.allowed_sites');
            $storagePath = Config::get('timthumb.storage_path');
            $getImageUrl = Config::get('timthumb.get_image_url');
            $seconds_to_cache = 86400 * 30 ;
            $ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
            header("Expires: $ts");
            header("Pragma: cache");
            header("Cache-Control: max-age=$seconds_to_cache");

                $params = array(
                    'src' => $src,
                    'w' => $w,
                    'h' => $h,
                    'zc' => $zc,
                    'allowed_sites' => $allowedSites,
                    'storage_path' => $storagePath,
                    'get_image_url' => $getImageUrl
                );
                return TimthumbExt::start($params);
        }

        static function link($src,$w = 0,$h = 0,$zc = 1) {
                $url = '/'.Config::get('timthumb.prefix').'/'.$w.'/'.$h.'/'.$zc.'/'.$src;
                return $url;
        }
}
