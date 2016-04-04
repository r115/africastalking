<?php namespace AfricasTalking;

use AfricasTalking\Foundation\SmsIntegration;
use GuzzleHttp\Client;

/**
 * Core class for the AfricasTalking API tools.
 *
 * @author Bernard Nandwa <nandwabee@gmail.com>
 * @package nandwabee\africastalking
 */
 
class AfricasTalking{
    /**
     * AfricasTalking constructor.
     *
     * Instantiate the credentials array and the Guzzle client.
     *
     * @param $username string
     * @param $key string
     */
    function __construct($username,$key){
        $this->client = new Client(
            [
                'headers' => ['Accept' => 'application/json','apikey' => $key]
            ]
        );

        $this->credentials = [
            'username' => $username,
            'key' => $key
        ];
    }

    /**
     * Send an sms message
     *
     * @param $recipients array
     * @param $message string The message to be sent
     * @param $options array
     *
     * @todo Format the response
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send(array $recipients,$message,array $options){
        $obj = new SmsIntegration($this->credentials,$this->client);

        $to = implode(",",$recipients);

        $response = $obj->send($to,$message,$options);

        //Need to format the response
        return $response;
    }
}