<?php namespace AfricasTalking\Foundation;

class SmsIntegration{
    protected $sms_url = 'https://api.africastalking.com/version1/messaging';

    function __construct()
    {

    }

    /**
     * Send a single sms message
     *
     * @param $to array The phone number(s) to send the message to.
     * @param $message string The message to be sent.
     * @param $payload array An array containing the message and other optional parameters.
     *
     * The $payload array expects the following keys;
     * bulk_sms :
     * from :
     * enqueue :
     * keyword :
     * linkId :
     * retryDurationInHours :
     *
     * An explanation for the keys is available at http://docs.africastalking.com/sms/sending
     */
    public function send($to,$message,$payload){

    }

    /**
     * Get sms messages
     */
    public function get_messages(){

    }

    /**
     * Validate the SMS optional parameters
     */
    private function validate_parameters(){

    }

    private function validate_phone_numbers(){

    }
}