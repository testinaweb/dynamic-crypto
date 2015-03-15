<?php

use DynamicCrypto\DynamicCrypto;
use DynamicCrypto\DynamicDecrypt;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $passphrase = 'ILoveDC';
        $input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

        $dynamicCrypto = new DynamicCrypto($passphrase);
        $dinamicDecrypt = new DynamicDecrypt($passphrase);

        $encryptedString= $dynamicCrypto->encrypt($input);
        $this->assertEquals($dinamicDecrypt->decrypt($encryptedString), $input);
    }
}
