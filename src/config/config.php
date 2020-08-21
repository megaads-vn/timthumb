<?php

return array(

    'prefix'                => 'proxy',
    
    'debug_on'              => false,
    'debug_level'           => 3,
    'file_cache_enabled'    => true,
    'file_cache_directory'  => app_path() . '/storage/cache/timthumb',
    'not_found_image'       => asset('public/packages/spescina/timthumb/images/nohoto.gif'),
    'error_image'           => asset('public/packages/spescina/timthumb/images/nohoto.gif'),
    'png_is_transparent'    => true,
    'allowed_sites'         => array(
        'flickr.com',
        'staticflickr.com',
        'live.staticflickr.com',
        'picasa.com',
        'img.youtube.com',
        'upload.wikimedia.org',
        'photobucket.com',
        'imgur.com',
        'imageshack.us',
        'tinypic.com',
        'system.getcashbackhere.net'
    ),
    'storage_path'          => '/frontend/timthumbs',
    'get_image_url' => true
);