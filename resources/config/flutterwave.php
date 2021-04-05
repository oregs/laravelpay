<?php

/*
 * This file is part of the Laravel Pay package.
 *
 * (c) Oregunwa Segun - Oregs <oregs4life@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

return [

    /**
     * Public Key: Your Pay publicKey. Sign up on https://dashboard.flutterwave.com/ to get one from your settings page
     *
     */
    'publicKey' => env('PAY_PUBLIC_KEY'),

    /**
     * Secret Key: Your Pay secretKey. Sign up on https://dashboard.flutterwave.com/ to get one from your settings page
     *
     */
    'secretKey' => env('PAY_SECRET_KEY'),

    /**
     * Prefix: Secret hash for webhook
     *
     */
    'secretHash' => env('PAY_SECRET_HASH', ''),
];
