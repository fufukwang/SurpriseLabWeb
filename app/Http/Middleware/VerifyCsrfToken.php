<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/dininginthedark/getPayDone',
        '/dininginthedark/en/getPayDone',
        '/deploy/suprise',
        '/tableforone/ECPayBackCallBack',
        '/tableforone/ECPaySuccess',
        '/tableforone/EcPayGiftCardBackCallBack',
        '/tableforone/EcPayGiftCardBack',
        // 微醺
        '/thegreattipsy/Neweb.ReturnResult',
        '/thegreattipsy/Neweb.BackReturn',
        // 無光 S3
        '/dininginthedark3/Neweb.ReturnResult',
        '/dininginthedark3/Neweb.BackReturn',
    ];
}
