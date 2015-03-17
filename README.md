Dynamic Crypto - Encrypter for PHP 5.4+
=======================================

[![Total Downloads](https://poser.pugx.org/testinaweb/dynamic-crypto/downloads.svg)](https://packagist.org/packages/testinaweb/dynamic-crypto)
[![Latest Stable Version](https://poser.pugx.org/testinaweb/dynamic-crypto/v/stable.svg)](https://packagist.org/packages/testinaweb/dynamic-crypto)

A php library to encrypt and decrypt strings with dynamic keys.
This was be implemented to guarantee a quite high security level.

Install
-------

Before using Dynamic Crypto in your project, add it to your "composer.json" file:

```
{
    "require": {
        "testinaweb/dynamic-crypto": "dev-master"
    }
}
```

or run this command as a bash command:

```
./composer.phar require testinaweb/dynamic-crypto dev-master
```

Usage
-----

```php
<?php

use DynamicCrypto\DynamicCryptoFactory;

$passPhrase = 'ILoveDC';
$input = '{"fullName":"Manuel Kanah","user":"testinaweb","email":"testinaweb@testinaweb.com"}';

$dynamicEncrypt = DynamicCryptoFactory::buildDynamicEncrypter($passPhrase);
$dynamicDecrypt = DynamicCryptoFactory::buildDynamicDecrypter($passPhrase);

$encryptedString = $dynamicEncrypt->encrypt($input);
$decryptedString = $dynamicDecrypt->decrypt($encryptedString);
```

Author
------

Manuel Kanah - <testinaweb@testinaweb.com> - <http://www.labna.it><br />
Special thanks to Gabriele Giuranno.

License
-------

Dynamic Crypto is licensed under the MIT License
