<?php

return [

     /*
    |--------------------------------------------------------------------------
    | ValueFirst Whatsapp API URI
    |--------------------------------------------------------------------------
    |
    | The ValueFirst Whatsapp Message API URI.
    |
    */

    'api_uri' => env('VALUEFIRST_API_URI','https://api.myvfirst.com/psms/servlet/psms.JsonEservice'),

    /*
    |--------------------------------------------------------------------------
    | From Number
    |--------------------------------------------------------------------------
    |
    | The Phone number registered with ValueFirst that your SMS will come from
    |
    */

    'from' => env('VALUEFIRST_FROM','Telkom109'),

     /*
    |--------------------------------------------------------------------------
    | Username
    |--------------------------------------------------------------------------
    |
    | Your ValueFirst Username
    |
    */

    'username' =>  env('VALUEFIRST_USERNAME','DEMO21NEWXML'),

     /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    |
    | Your ValueFirst Password
    |
    */

    'password' =>  env('VALUEFIRST_PASSWORD','test@2021'),
];
