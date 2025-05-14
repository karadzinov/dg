<?php

return [

    /*
    |--------------------------------------------------------------------------
    | OpenAI API Configuration
    |--------------------------------------------------------------------------
    |
    | These settings are used to authenticate with the OpenAI API. You can
    | specify your API key, the model to use (e.g., gpt-3.5-turbo), and
    | how many retries should be attempted in case of failure.
    |
    */

    'api_key' => env('OPENAI_API_KEY', 'your-default-api-key'),

    'model' => env('OPENAI_MODEL', 'gpt-3.5-turbo'),

    'base_uri' => env('OPENAI_BASE_URI', 'https://api.openai.com/v1'),

    'max_retries' => env('OPENAI_MAX_RETRIES', 3),

    'timeout' => env('OPENAI_TIMEOUT', 30),

    'system_message' => env('OPENAI_SYSTEM_MESSAGE', 'You are a helpful assistant. Use the following context to answer the user\'s question.'),

];
