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

    'GOOGLE_MAPS_API_KEY' => env('GOOGLE_MAPS_API_KEY', ''),

    'ADVANCE_AI_API_KEY' => env('ADVANCE_AI_API_KEY', '346b76a58f959271'),
    'ADVANCE_AI_SECRET_KEY' => env('ADVANCE_AI_SECRET_KEY', '346b76a58f959271'),
    'ADVANCE_AI_HOST' => env('ADVANCE_AI_HOST', 'https://api.advance.ai'),
    'ADVANCE_AI_OCR_CHECK' => env('ADVANCE_AI_OCR_CHECK', '/openapi/face-recognition/v2/ocr-check'),
    'ADVANCE_AI_OCR_KTP_CHECK' => env('ADVANCE_AI_OCR_KTP_CHECK', '/openapi/face-recognition/v1/ocr-ktp-check'),
    'ADVANCE_AI_FACE_COMPARISON' => env('ADVANCE_AI_FACE_COMPARISON', '/openapi/face-recognition/v3/check'),

    'TRANSACTION_VENDOR_STATUS_MENUNGGU_VENDOR' => env('TRANSACTION_VENDOR_STATUS_MENUNGGU_VENDOR', 1),
    'TRANSACTION_VENDOR_STATUS_DIPROSES' => env('TRANSACTION_VENDOR_STATUS_DIPROSES', 2),
    'TRANSACTION_VENDOR_STATUS_DIKIRIM' => env('TRANSACTION_VENDOR_STATUS_DIKIRIM', 3),
    'TRANSACTION_VENDOR_STATUS_SELESAI' => env('TRANSACTION_VENDOR_STATUS_SELESAI', 4),
    'TRANSACTION_VENDOR_STATUS_DIBATALKAN' => env('TRANSACTION_VENDOR_STATUS_DIBATALKAN', 5),
];
