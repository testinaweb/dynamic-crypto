# Dynamic Crypto

A php project to encrypt and decrypt strings with dynamic keys

```php
use DynamicCrypto\DynamicCryptoFactory;

$passPhrase = 'ILoveDC';
$input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

$dynamicEncrypt = DynamicCryptoFactory::buildDynamicEncrypter($passPhrase);
$dynamicDecrypt = DynamicCryptoFactory::buildDynamicDecrypter($passPhrase);

$encryptedString = $dynamicEncrypt->encrypt($input);
$decryptedString = $dynamicDecrypt->decrypt($encryptedString);
```

Special thanks to Gabriele Giuranno.