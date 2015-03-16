<?php

use DynamicCrypto\DynamicCryptoFactory;

class DynamicCryptoFactoryTest extends PHPUnit_Framework_TestCase
{
    private $passPhrase = 'ILoveDC';

    public function testDynamicCryptoFactoryReturnADynamicEncrypterObject()
    {
        $dynamicEncrypter = DynamicCryptoFactory::buildDynamicEncrypter($this->passPhrase);
        $this->assertInstanceOf('DynamicCrypto\DynamicEncrypter', $dynamicEncrypter);
    }

    public function testDynamicCryptoFactoryReturnADynamicDecrypterObject()
    {
        $dynamicDecrypter = DynamicCryptoFactory::buildDynamicDecrypter($this->passPhrase);
        $this->assertInstanceOf('DynamicCrypto\DynamicDecrypter', $dynamicDecrypter);
    }
}
