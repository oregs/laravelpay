<?php

namespace Oregsideas\Pay\Helpers;

use Illuminate\Support\Facades\Log;

/**
 * Flutterwave's payment laravel package
 * @author Oregunwa Segun - Oregs <oregsgraphix@gmail.com>
 * @version 1
 **/
class PaymentConfig
{

    protected $publicKey;
    protected $secretKey;
    protected $baseUrl;
    protected $ref;
    protected $requestType;

    /**
     * Construct
     */
    function __construct(String $publicKey, String $secretKey, String $baseUrl, String $ref, String $requestType)
    {
        $this->publicKey = $publicKey;
        $this->secretKey = $secretKey;
        $this->baseUrl = $baseUrl;
        $this->ref = $ref;
        $this->requestType = $requestType;
    }

    /**
     * Configuration for payments
     * @param $data
     * @return object
     */
    public function paymentConfiguration()
    {
        return $this->secretKey;
    }
}
