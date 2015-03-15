# Dynamic Crypto

A php project to encrypt and decrypt strings with dynamic keys

```php
use DynamicCrypto\DynamicEncrypt;
use DynamicCrypto\DynamicDecrypt;

$passphrase = 'ILoveDC';
$input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

$dynamicEncrypt = new DynamicEncrypt($passphrase);
$dynamicDecrypt = new DynamicDecrypt($passphrase);

$encryptedString = $dynamicEncrypt->encrypt($input);
$decryptedString = $dynamicDecrypt->decrypt($encryptedString);
```

Special thanks to Gabriele Giuranno.