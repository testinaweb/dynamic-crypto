<?php

use DynamicCrypto\DynamicDecrypter;

class DynamicDecrypterTest extends PHPUnit_Framework_TestCase
{
    private $dynamicDecrypter;

    public function __construct()
    {
        $key = $this->getMockBuilder('DynamicCrypto\Parameter')
            ->disableOriginalConstructor()
            ->getMock();
        $key->method('getSubString')
            ->willReturn('abcdefghijklmnopqrstuvwx');
        $key->method('setHexadecimalPosition');

        $IV = $this->getMockBuilder('DynamicCrypto\Parameter')
            ->disableOriginalConstructor()
            ->getMock();
        $IV->method('getSubString')
            ->willReturn('abcdefgh');
        $IV->method('setHexadecimalPosition');

        $stringFormatter = $this->getMockBuilder('DynamicCrypto\StringFormatter')
            ->disableOriginalConstructor()
            ->getMock();
        $stringFormatter->method('cleanString')
            ->will($this->returnArgument(0));

        $this->dynamicDecrypter = new DynamicDecrypter($key, $IV, $stringFormatter);
    }

    public function testTest()
    {
        $this->assertEquals('abcdefgh', $this->dynamicDecrypter->decrypt('cNt12ud0rWo0000'));
    }
}
