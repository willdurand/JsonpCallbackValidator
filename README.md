CallbackValidator
=================

[![Build
Status](https://travis-ci.org/willdurand/CallbackValidator.png?branch=master)](https://travis-ci.org/willdurand/CallbackValidator)


Usage
-----

```php
$validator = new \CallbackValidator\CallbackValidator();

$validator->validate('JSONP.callback');
// returns `true` or `false` depending on the given callback value
```


Installation
------------

The recommended way to install CallbackValidator is through
[Composer](http://getcomposer.org/):

``` json
{
    "require": {
        "willdurand/callback-validator": "@stable"
    }
}
```

**Protip:** you should browse the
[`willdurand/callback-validator`](https://packagist.org/packages/willdurand/callback-validator)
page to choose a stable version to use, avoid the `@stable` meta constraint.


Credits
-------

* Erik Eng ([@ptz0n](https://github.com/ptz0n)) for [his
  Gist](https://gist.github.com/ptz0n/1217080)


License
-------

CallbackValidator is released under the MIT License. See the bundled LICENSE
file for details.
