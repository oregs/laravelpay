<?php

namespace Oregsideas\Pay;

use Illuminate\Support\Facades\Log;

/**
 * Flutterwave's payment laravel package
 * @author Oregunwa Segun - Oregs <oregsgraphix@gmail.com>
 * @version 1
 **/
class Pay
{

    protected $publicKey;
    protected $secretKey;
    protected $baseUrl;
    protected $ref;
    protected $requestType;
    protected $clientData;

    /**
     * Construct
     */
    function __construct()
    {

        $this->publicKey = env('PAY_PUBLIC_KEY');
        $this->secretKey = env('PAY_SECRET_KEY');
        $this->secretHash = env('PAY_SECRET_HASH');
        $this->baseUrl = 'https://api.flutterwave.com/v3';
        $this->ref;
        $this->requestType;
        $this->clientData;
    }


    /**
     * Generates a unique reference
     * @param $transactionPrefix
     * @return string
     */

    public function generateReference(String $transactionPrefix = NULL)
    {
        if ($transactionPrefix) {
            return $transactionPrefix . '_' . uniqid(time());
        }
        return 'pay_' . uniqid(time());
    }

    /**
     * Reaches out to Flutterwave to initialize a payment
     * @param $data
     * @return object
     */
    public function initPayment(array $data)
    {
        $this->ref = '/payments';
        $this->requestType = 'POST';
        $this->clientData = $data;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseUrl.$this->ref,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_CUSTOMREQUEST => $this->requestType,
            CURLOPT_POSTFIELDS => json_encode($this->clientData),
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json',
                'Authorization: Bearer '.$this->secretKey
            )
        ));


        $pay = curl_exec($curl);

        curl_close($curl);

        return json_decode($pay);
    }


    /**
     * Gets a transaction ID depending on the redirect structure
     * @return string
     */
    public function getTransactionIDFromCallback()
    {
        $transactionID = request()->transaction_id;

        if (!$transactionID) {
            
            $transactionID = request()->status;
        }

        return $transactionID;
    }

    /**
     * Reaches out to Flutterwave to verify a transaction
     * @param $id
     * @return object
     */
    public function verifyTransaction($id)
    {

    }


}
