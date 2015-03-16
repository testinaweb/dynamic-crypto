<?php

use DynamicCrypto\Parameter;

class KeyTest extends PHPUnit_Framework_TestCase
{
    protected $key;

    public function __construct()
    {
        $passPhrase = $this->getMockBuilder('DynamicCrypto\PassPhrase')
            ->disableOriginalConstructor()
            ->getMock();

        $passPhrase->method('getSuperKey')
            ->willReturn('abcdefghijklmnopqrstuvwxyz');

        $passPhrase->method('getSuperKeyLen')
            ->willReturn(26);

        $this->key = new Parameter($passPhrase, 24);
    }

    public function testGetRandomDecimalPosition()
    {
        $value = $this->key->getRandomDecimalPosition();
        $this->assertTrue(is_int($value));
        $this->assertTrue($value >= 0 && $value <= 2);
    }

    public function testGetRandomHexadecimalPosition()
    {
        $value = $this->key->getRandomHexadecimalPosition();
        $this->assertRegExp('/[0-9a-f]{2}/i', $value);
        $this->assertEquals($this->key->getRandomDecimalPosition(), hexdec($value));
    }

    public function testGetSubString()
    {
        $value = $this->key->getSubString();
        $this->assertRegExp('/[a-z]{24}/', $value);
        $this->assertTrue(strpos('abcdefghijklmnopqrstuvwxyz', $value) !== false);
    }
} 