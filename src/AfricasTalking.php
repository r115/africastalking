<?php namespace AfricasTalking;
use GuzzleHttp\Client;

/**
 * Core class for the AfricasTalking API tools.
 *
 * @author Bernard Nandwa <nandwabee@gmail.com>
 * @package nandwabee\africastalking
 */
 
class AfricasTalking{
    function __construct(){
        $this->client = new Client();
    }


    /**
     * Send an sms message
     */
    public function send(){

    }
}