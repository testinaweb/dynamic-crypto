<?php

use DynamicCrypto\DynamicEncrypt;
use DynamicCrypto\DynamicDecrypt;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $passphrase = 'ILoveDC';
        $input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

        $dynamicEncrypt = new DynamicEncrypt($passphrase);
        $dynamicDecrypt = new DynamicDecrypt($passphrase);

        $encryptedString = $dynamicEncrypt->encrypt($input);
        $this->assertEquals($dynamicDecrypt->decrypt($encryptedString), $input);
    }
}
