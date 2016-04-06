# Africas Talking API

This is another look at the AfricasTalking API for PHP.

I wrote it to meet a personal project need and it should suffice for many other use cases.

## Requirements
The main difference between this code and the official wrapper is that I opted to go for guzzle instead of hard dependency on Curl.

- [Guzzle](http://guzzle.readthedocs.org/en/5.3/overview.html)
- PHP 5.5.0 or newer. PHP 7 is currently not tested.

Be sure to checkout Guzzle's own dependencies.

## Documentation
Install using composer.

`composer require nandwabee/africastalking`

### Sending Messages
An sms can be sent out by calling the `send()` method.

Example code below should suffice;


```php

//Instantiate the object`

$obj = new AfricasTalking();

$obj->send($to,$message,$options);

```

**Parameters**

`$to` : *array* This is an array of the numbers to send the messages to.

`$message` : *string* The message to be sent.

`$options` : *array* An array of optional parameters. 

The options parameter allows the following parameters; `from,bulkSMSMode,enqueue,keyword,linkId,retryDurationInHours`

The expected values for either of those parameters can be found on the [AfricasTalking API Docs](http://docs.africastalking.com/sms/sending/url#documentation)

## Contribution
This is an open source project so all ideas to help make this a better tool for other developers are highly welcome.

Try as much as possible to stick to the PSR-4 standards.

Waiting for the pull requests :-)

##TODO
- <s>Send SMS</s>
- Support phone calls
- Receive SMS messages
- Support to Premium rate SMS services
- Create a sample Laravel 5 package
- Update the documentation with sample code
- Support for USSD
- Write tests
- Support for airtime transactions
- Fetch User data