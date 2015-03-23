<?php

use DynamicCrypto\DynamicCryptoFactory;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var string
     */
    protected static $passPhrase = 'ILoveDC';

    /**
     * @var
     */
    protected static $encrypter;

    /**
     * @var
     */
    protected static $decrypter;

    public static function setUpBeforeClass()
    {
        self::$encrypter = DynamicCryptoFactory::buildDynamicEncrypter(self::$passPhrase);
        self::$decrypter = DynamicCryptoFactory::buildDynamicDecrypter(self::$passPhrase);
    }

    /**
     * @dataProvider provider
     */
    public function testMultipleEncryptionAndDecryption($string)
    {
        $encryptedString = self::$encrypter->encrypt($string);
        $this->assertEquals(self::$decrypter->decrypt($encryptedString), $string);
    }

    /**
     * @return array
     */
    public function provider()
    {
        return [
            ['Manuel Kanah'],
            ['manuel@kanah.it'],
            ['Lorem ipsum dolor sit amet, an sit verear recteque.']
        ];
    }
}
