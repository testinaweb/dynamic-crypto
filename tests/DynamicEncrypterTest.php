<?php

use DynamicCrypto\DynamicEncrypter;

class DynamicEncrypterTest extends PHPUnit_Framework_TestCase
{
    private $dynamicEncrypter;

    public function __construct()
    {
        $key = $this->getMockBuilder('DynamicCrypto\Parameter')
            ->disableOriginalConstructor()
            ->getMock();
        $key->method('getSubString')
            ->willReturn('abcdefghijklmnopqrstuvwx');
        $key->method('getRandomHexadecimalPosition')
            ->willReturn('00');

        $IV = $this->getMockBuilder('DynamicCrypto\Parameter')
            ->disableOriginalConstructor()
            ->getMock();
        $IV->method('getSubString')
            ->willReturn('abcdefgh');
        $IV->method('getRandomHexadecimalPosition')
            ->willReturn('00');

        $stringFormatter = $this->getMockBuilder('DynamicCrypto\StringFormatter')
            ->disableOriginalConstructor()
            ->getMock();
        $stringFormatter->method('prepareString')
            ->willReturn('abcdefgh');

        $this->dynamicEncrypter = new DynamicEncrypter($key, $IV, $stringFormatter);
    }

    public function testTest()
    {
        $this->assertEquals('cNt12ud0rWo0000', $this->dynamicEncrypter->encrypt('abcdefgh'));
    }
}
