<?php

return array(
    'library'     => 'gd',
    'upload_dir'  => 'covers',
    'assets_upload_path' => 'storage/app/public/covers',
    'default'     => [
        'url'     => '',
        'width'   => 120,
        'height'  => 120
    ],
    'dimensions'  => [
        ['848', '480',  false,  90, 'small'],
        ['1280', '720',  false,  90, 'medium'],
        ['1600', '900',  false,  90, 'large']
    ]
);