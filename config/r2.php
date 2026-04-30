<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudflare R2 Storage Configuration
    |--------------------------------------------------------------------------
    | These values are pulled from your .env file. They support both
    | Cloudflare R2 Storage and S3-compatible storage providers (AWS, MinIO, Wasabi, etc.).
    |
    */

    'key'       => env('R2_ACCESS_KEY_ID'),
    'secret'    => env('R2_SECRET_ACCESS_KEY'),
    'bucket'    => env('R2_BUCKET_NAME'),
    'url'       => env('R2_ENDPOINT'),

    /*
    |--------------------------------------------------------------------------
    | Public Endpoint
    |--------------------------------------------------------------------------
    | Only needed if you’re using a custom S3 endpoint (AWS, MinIO, Wasabi, etc.)
    | For Cloudflare R2 Storage, leave this null.
    |
    */
    'endpoint'  => env('R2_PUBLIC_ENDPOINT')

];