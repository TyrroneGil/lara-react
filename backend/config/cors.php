<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    */

    // 1. Paths where CORS applies (usually just your api routes)
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    // 2. Allowed HTTP methods (GET, POST, PUT, DELETE, etc.)
    'allowed_methods' => ['*'],

    // 3. Explicitly allow your frontend URL here!
    'allowed_origins' => [
        'http://localhost:3000',      // React / Next.js default
        'http://localhost:5173',      // Vite / Vue / Svelte default
        'https://yourfrontend.com',   // Your production domain
    ],

    'allowed_origins_patterns' => [],

    // 4. Allowed request headers
    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // 5. Change to true if your frontend sends cookies or auth headers
    'supports_credentials' => true, 

];
