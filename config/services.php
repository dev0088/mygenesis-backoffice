<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'firebase' => [
        'apiKey' => "AIzaSyDoAjhMLWRtJT62MhtNPxcGugVdLFKjMFU",
        'authDomain' => "tina-project-a9ad6.firebaseapp.com",
        'databaseURL' => "https://tina-project-a9ad6.firebaseio.com",
        'projectId' => "tina-project-a9ad6",
        'storageBucket' => "tina-project-a9ad6.appspot.com",
        'messagingSenderId' => "431985002265",
        'appId' => "1:431985002265:web:256faf035b4d6ae8b16788",
        'measurementId' => "G-Q0E2KQMXPK"
    ],

];
