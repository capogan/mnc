<?php
return [
    'is_production' => env('PRIVYID_PRODUCTION'),
    'production' => [
        'merchant_key' => env('PRIVYID_MERCHANT_KEY'),
        'username' => env('PRIVYID_USER'),
        'password' => env('PRIVYID_PASSWORD'),
        'user' => env('PRIVYID_USER'),
        'owner' => env('PRIVYID_OWNER'),
        'enterprise_owner' => env('PRIVYID_ENTERPRISE_OWNER'),
        'enterprise_owner_token' =>env('PRIVYID_ENTERPRISE_OWNER_TOKEN')
    ],
    'sandbox' => [
        'merchant_key' => env('PRIVYID_SANDBOX_MERCHANT_KEY'),
        'username' => env('PRIVYID_SANDBOX_USER'),
        'password' => env('PRIVYID_SANDBOX_PASSWORD'),
        'user' => env('PRIVYID_SANDBOX_USER'),
        'owner' => env('PRIVYID_SANDBOX_OWNER'),
        'enterprise_owner' => env('PRIVYID_ENTERPRISE_OWNER'),
        'enterprise_owner_token' =>env('PRIVYID_ENTERPRISE_OWNER_TOKEN')
    ],
    'client_id' => env('PRIVYID_CLIENT_ID'),
    'secret_key' => env('PRIVYID_SECRET_KEY'),
    
];
