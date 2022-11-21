<?php

return array(
    'library'     => 'gd',
    'upload_dir'  => 'avatars',
    'assets_upload_path' => 'storage/app/public/avatars',
    'quality'     => 100,
    'default'     => [
        'url'     => '',
        'width'   => 120,
        'height'  => 120
    ],
    'dimensions'  => [
        ['24', '24',  false,  95, 'xsmall'],
        ['60', '60',  false,  95, 'small'],
        ['120', '120', false, 95, 'avatar'],
        ['500', '500',  true, 95, 'profile']
    ]
);