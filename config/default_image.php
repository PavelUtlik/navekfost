<?php

return array(
    'library'     => 'gd',
    'upload_dir'  => 'avatars',
    'assets_upload_path' => 'storage/app/public/avatars',
    'quality'     => 100,
    'default'     => [
        'url'     => '',
        'width'   => 150,
        'height'  => 150
    ],
    'dimensions'  => [
        ['50',  '50',   true,   85, 'thumbnail'],
        ['160', '120',  false,  85, 'xsmall'],
        ['240', '180',  false,  85, 'small'],
        ['300', '300',  true,   85, 'profile'],
        ['640', '480',  false,  85, 'medium'],
        ['800', '600',  false,  85, 'large']
    ]
);