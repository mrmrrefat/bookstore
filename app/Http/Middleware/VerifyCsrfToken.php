<?php

namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected $addHttpCookie = true;
   
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'auth/facebook/callback',

        'http://localhost/writer', 
    'App\Http\Controllers\WriterController\store',
    '127.0.0.1:8000/writer',
    '127.0.0.1:8000/writer/'
    ];
    
}

