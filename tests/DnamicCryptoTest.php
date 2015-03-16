<?php

use DynamicCrypto\DynamicCryptoFactory;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $passPhrase = 'ILoveDC';
        $input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt

        $dynamicEncrypt = DynamicCryptoFactory::buildDynamicEncrypter($passPhrase);
        $dynamicDecrypt = DynamicCryptoFactory::buildDynamicDecrypter($passPhrase);

        $encryptedString = $dynamicEncrypt->encrypt($input);
        $this->assertEquals($dynamicDecrypt->decrypt($encryptedString), $input);
    }
}
