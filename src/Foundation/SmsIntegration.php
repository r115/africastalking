<?php namespace AfricasTalking\Foundation;

use GuzzleHttp\Client;
use GuzzleHttp\Stream\Stream;

class SmsIntegration{
    function __construct($credentials,Client $client)
    {
        $this->sms_url = 'https://api.africastalking.com/version1/messaging';

        $this->client = $client;

        $this->credentials = $credentials;
    }

    /**
     * Send a single sms message
     *
     * @param $to string The phone number(s) to send the message to.
     * @param $message string The message to be sent.
     * @param $options array An array containing the message and other optional parameters.
     *
     * The $options array expects the following keys;
     * bulkSMSMode :
     * from :
     * enqueue :
     * keyword :
     * linkId :
     * retryDurationInHours :
     *
     * An explanation for the keys is available at http://docs.africastalking.com/sms/sending
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    public function send($to,$message,$options){
        //Validate the options
        $optional_params = $this->validate_optional_parameters($options);

        //Craft the parameters to be passed to the Guzzle client
        $params = [
            'username' => $this->credentials['username'],
            'to' => $to,
            'message' => $message,
        ];

        $api_params = array_merge($params,$optional_params);

        $client = $this->client;

        $request = $client->createRequest('POST', $this->sms_url);

        $request->addHeader('apikey',$this->credentials['key']);
        $request->addHeader('Accept','application/json');
        $request->addHeader('content-type','application/x-www-form-urlencoded');
        $request->setBody(Stream::factory(http_build_query($api_params)));

        $response = $client->send($request);

        return $response->json();

    }

    /**
     * Get sms messages
     *
     * @param int $last_id
     *
     * @return mixed
     */
    public function get_messages($last_id=0){
        $request = $this->client->createRequest('GET', $this->sms_url);

        $request->addHeader('apikey',$this->credentials['key']);
        $request->addHeader('Accept','application/json');

        $params = $request->getQuery();

        $params->set('username',$this->credentials['username']);
        $params->set('lastReceivedId',$last_id);

        $response = $this->client->send($request);

        return $response->json();
    }

    /**
     * Create a new subscription
     */
    public function create_subscription($phone,$shortcode,$keyword){

    }

    /**
     * Validate the SMS optional parameters. Return a formatted array
     *
     * @param $options array
     *
     * @return array
     */
    private function validate_optional_parameters(array $options){
        $allowed_keys = [
            'bulkSMSMode',
            'enqueue',
            'keyword',
            'linkId',
            'retryDurationInHours',
            'from'
        ];

        $params = [];

        foreach($options as $key => $value){
            if(in_array($key,$allowed_keys) && strlen($value) > 0){
                $params[$key] = $value;
            }
        }

        return $params;

    }

    private function validate_phone_numbers(){

    }
}