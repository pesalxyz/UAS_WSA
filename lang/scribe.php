<?php

return [
    'labels' => [
        'search' => 'Cari',
        'base_url' => 'URL Dasar',
    ],

    'auth' => [
        'none' => 'API ini tidak menggunakan autentikasi.',
        'instruction' => [
            'query' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan parameter query **`:parameterName`** pada request.
                TEXT,
            'body' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan parameter **`:parameterName`** pada body request.
                TEXT,
            'query_or_body' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan parameter **`:parameterName`** pada query string atau body request.
                TEXT,
            'bearer' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan header **`Authorization`** dengan nilai **`"Bearer :placeholder"`**.
                TEXT,
            'basic' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan header **`Authorization`** dalam format **`"Basic {credentials}"`**.
                Nilai `{credentials}` harus berupa username/id dan password yang digabung dengan titik dua (:),
                lalu di-encode dengan base64.
                TEXT,
            'header' => <<<'TEXT'
                Untuk mengautentikasi request, sertakan header **`:parameterName`** dengan nilai **`":placeholder"`**.
                TEXT,
        ],
        'details' => <<<'TEXT'
            Semua endpoint yang membutuhkan autentikasi ditandai dengan badge `memerlukan autentikasi` pada dokumentasi di bawah ini.
            TEXT,
    ],

    'headings' => [
        'introduction' => 'Pendahuluan',
        'auth' => 'Autentikasi Request',
    ],

    'endpoint' => [
        'request' => 'Request',
        'headers' => 'Header',
        'url_parameters' => 'Parameter URL',
        'body_parameters' => 'Parameter Body',
        'query_parameters' => 'Parameter Query',
        'response' => 'Response',
        'response_fields' => 'Field Response',
        'example_request' => 'Contoh request',
        'example_response' => 'Contoh response',
        'responses' => [
            'binary' => 'Data biner',
            'empty' => 'Response kosong',
        ],
    ],

    'try_it_out' => [
        'open' => 'Coba request ⚡',
        'cancel' => 'Batal 🛑',
        'send' => 'Kirim Request 💥',
        'loading' => '⏱ Mengirim...',
        'received_response' => 'Response diterima',
        'request_failed' => 'Request gagal dengan error',
        'error_help' => <<<'TEXT'
            Tips: Pastikan koneksi jaringan berjalan dengan baik.
            Jika Anda pengelola API ini, pastikan server API sedang berjalan dan CORS sudah diaktifkan.
            Anda juga bisa memeriksa console Dev Tools untuk informasi debug.
            TEXT,
    ],

    'links' => [
        'postman' => 'Lihat koleksi Postman',
        'openapi' => 'Lihat spesifikasi OpenAPI',
    ],
];
