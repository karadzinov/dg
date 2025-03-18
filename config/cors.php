<?php

return [
    'paths' => ['api/*', 'oauth/*'], // Allow API & OAuth routes
    'allowed_methods' => ['*'], // Allow all HTTP methods
    'allowed_origins' => ['*'], // Or replace with ['http://localhost:3000'] for security
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];
