<?php

use DynamicCrypto\DynamicCrypto;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $passphrase = 'ILoveDC';
        $input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

        $dynamicCrypto = new DynamicCrypto($passphrase);
        $encryptedString= $dynamicCrypto->encrypt($input);
        $this->assertEquals($dynamicCrypto->decrypt($encryptedString), $input);
    }
}
