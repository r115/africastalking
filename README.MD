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