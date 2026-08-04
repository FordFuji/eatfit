<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = ['/response_url', '/notify_url', '/qr_code_url', '/responseMCC', '/unionpay_url', '/unionpay_notify_url'];
}
