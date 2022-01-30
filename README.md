# JsonpCallbackValidator

[![GitHub Actions](https://github.com/willdurand/JsonpCallbackValidator/workflows/ci/badge.svg)](https://github.com/willdurand/JsonpCallbackValidator/actions?query=workflow%3A%22ci%22+branch%3Amaster)
[![Total
Downloads](https://poser.pugx.org/willdurand/jsonp-callback-validator/downloads.png)](https://packagist.org/packages/willdurand/jsonp-callback-validator)
[![Latest Stable
Version](https://poser.pugx.org/willdurand/jsonp-callback-validator/v/stable.png)](https://packagist.org/packages/willdurand/jsonp-callback-validator)

**JsonpCallbackValidator** allows you to **validate a JSONP callback** in order
to prevent XSS attacks.

## Usage

```php
$validator = new \JsonpCallbackValidator();

$validator->validate("JSONP.callback");
// returns `true`

$validator->validate("(function xss(x){evil()})");
// returns `false`
```

Or as a static method:

```php
\JsonpCallbackValidator::validate("JSONP.callback");
// returns `true`

\JsonpCallbackValidator::validate("(function xss(x){evil()})");
// returns `false`
```

## Installation

The recommended way to install JsonpCallbackValidator is through
[Composer](https://getcomposer.org/):

```bash
$ composer require willdurand/jsonp-callback-validator
```

## Unit Tests

Setup the test suite using Composer:

    $ composer install

Run it using PHPUnit:

    $ ./vendor/bin/simple-phpunit

## Contributing

See [CONTRIBUTING](CONTRIBUTING.md) file.

## Credits

- Erik Eng ([@ptz0n](https://github.com/ptz0n)) for [his
  Gist](https://gist.github.com/ptz0n/1217080)

## License

JsonpCallbackValidator is released under the MIT License. See the bundled
LICENSE file for details.
