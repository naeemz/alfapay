# AlfaPay

[![Latest Version on Packagist](https://img.shields.io/packagist/v/naeemz/alfapay.svg?style=flat-square)](https://packagist.org/packages/naeemz/alfapay)
[![Total Downloads](https://img.shields.io/packagist/dt/naeemz/alfapay.svg?style=flat-square)](https://packagist.org/packages/naeemz/alfapay)
![GitHub Actions](https://github.com/naeemz/alfapay/actions/workflows/main.yml/badge.svg)

This is Bank Alfalah payment gateway package to pay using Alfa Wallet, Bank Account Number or Credit Card (Credit Card not yet implemented). You can use this package with Laravel or any PHP framework via composer.

## Installation

You can install the package via composer:

```bash
composer require naeemz/alfapay
```

## Set .env configurations
You can get these values from Bank Alfalah Merchant portal
```php
ALFAPAY_URL=https://sandbox.bankalfalah.com/HS/api/HSAPI/HSAPI
ALFAPAY_CHANNEL_ID=
ALFAPAY_MERCHANT_ID=
ALFAPAY_STORE_ID=
ALFAPAY_RETURN_URL=
ALFAPAY_MERCHANT_USERNAME=
ALFAPAY_MERCHANT_PASSWORD=
ALFAPAY_MERCHANT_HASH=
ALFAPAY_KEY_1=
ALFAPAY_KEY_2=
```

## Usage
First you've to get auth token by providing your unique transaction number or order number
and then can post request the amount information along with some validation.
Please refer to YouTube video for full understanding.
```php
// generate random transaction/order number
$transNum = rand(0,17866120);
        
// get AuthToken from AlfaPay API
$alfa       = new AlfaPay();
$response   = $alfa->setTransactionReferenceNumber($transNum)->getToken();
//
if( $response != null && $response->success == 'true' ) {
    return $response->AuthToken;
} else {
    // log error
    if( $response == null ) {
        abort(403, 'Error: Timeout connection. Auth Token not generated.');
    } else {
        abort(403, 'Error: '.$response->ErrorMessage.'. Auth Token does not generated.');
    }
}

// Put above generated AuthToken string into hidden field of form
// Next send user info along with AuthToken
// TODO: Please watch YouTube video.
```

### Testing

```bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email naeemins@gmail.com instead of using the issue tracker.

## Credits

-   [naeemz](https://github.com/naeemz)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
