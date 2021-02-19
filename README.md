# Very short description of the package

[![Latest Version on Packagist](https://img.shields.io/packagist/v/mr687/wamazing.svg?style=flat-square)](https://packagist.org/packages/mr687/wamazing)
[![Build Status](https://img.shields.io/travis/mr687/wamazing/master.svg?style=flat-square)](https://travis-ci.org/mr687/wamazing)
[![Quality Score](https://img.shields.io/scrutinizer/g/mr687/wamazing.svg?style=flat-square)](https://scrutinizer-ci.com/g/mr687/wamazing)
[![Total Downloads](https://img.shields.io/packagist/dt/mr687/wamazing.svg?style=flat-square)](https://packagist.org/packages/mr687/wamazing)

[Wamazing](https://wamazing.asia) for Laravel

## Installation

You can install the package via composer:

```bash
composer require mr687/wamazing
```

The service provider should automatically register for Laravel > 5.4.

For Laravel < 5.5, open config/app.php and, within the providers array, append:

```php
Mr687\Wamazing\Providers\WamazingServiceProvider::class
```

## Configuration file

Publish the configuration file

```bash
php artisan vendor:publish --provider="Mr687\Wamazing\Providers\ZoomServiceProvider"
```

This will create a wamazing/config.php within your config directory, where you add value for secret token.

```bash
....

WAMAZING_TOKEN=
WAMAZING_DEVICE=
```

## Usage

Send Text.

```php
use Mr687\Wamazing\Facades\Wamazing;

Wamazing::chat()
  ->to('6282325xxx')
  ->message('<b>Hai</b>')
  ->sendText();
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

If you discover any security related issues, please email daphinokioo@gmail.com instead of using the issue tracker.

## Credits

-   [Daphinokio](https://github.com/mr687)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
