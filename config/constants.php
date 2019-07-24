<?php
return [
    'APP_NAME' => env('APP_NAME', 'CNAF'),
    'APP_ENV' => env('APP_ENV', 'local'),
    'APP_URL' => env('APP_URL', 'http://localhost/cnaf/'),
    'UPLOAD_PATH' => env('UPLOAD_PATH', 'C:/Xampp/htdocs/storage/cnaf/'),
    'LINK_PATH' => env('LINK_PATH', 'http://localhost/storage/cnaf/'),

    'DB_CONNECTION' => env('DB_CONNECTION', 'mysql'),
    'DB_HOST' => env('DB_HOST', 'localhost'),
    'DB_PORT' => env('DB_PORT', 3306),
    'DB_DATABASE' => env('DB_DATABASE', 'cnaf'),
    'DB_USERNAME' => env('DB_USERNAME', 'root'),
    'DB_PASSWORD' => env('DB_PASSWORD', ''),

    'MAIL_DRIVER' => env('MAIL_DRIVER', 'smtp'),
    'MAIL_HOST' => env('MAIL_HOST', 'smtp.gmail.com'),
    'MAIL_PORT' => env('MAIL_PORT', 587),
    'MAIL_USERNAME' => env('MAIL_USERNAME', 'havea.crenata@gmail.com'),
    'MAIL_PASSWORD' => env('MAIL_PASSWORD', ''),
    'MAIL_ENCRYPTION' => env('MAIL_ENCRYPTION', 'tls'),
    'MAIL_INITIAL' => env('MAIL_INITIAL', 'Scranaver'),

    'GOOGLE_MAPS_API_KEY' => env('GOOGLE_MAPS_API_KEY', 'AIzaSyATw_FSgimf5vX9WsaTCgNAv_YMjkpdcqM')
];