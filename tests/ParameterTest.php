<?php

use DynamicCrypto\Parameter;

class ParameterTest extends PHPUnit_Framework_TestCase
{
    protected $parameter;

    public function __construct()
    {
        $passPhrase = $this->getMockBuilder('DynamicCrypto\PassPhrase')
            ->disableOriginalConstructor()
            ->getMock();

        $passPhrase->method('getSuperKey')
            ->willReturn('abcdefghijklmnopqrstuvwxyz');

        $passPhrase->method('getSuperKeyLen')
            ->willReturn(26);

        $this->parameter = new Parameter($passPhrase, 24);
    }

    public function testGetRandomDecimalPosition()
    {
        $value = $this->parameter->getRandomDecimalPosition();
        $this->assertTrue(is_int($value));
        $this->assertTrue($value >= 0 && $value <= 2);
    }

    public function testGetRandomHexadecimalPosition()
    {
        $value = $this->parameter->getRandomHexadecimalPosition();
        $this->assertRegExp('/[0-9a-f]{2}/i', $value);
        $this->assertEquals($this->parameter->getRandomDecimalPosition(), hexdec($value));
    }

    public function testGetSubString()
    {
        $value = $this->parameter->getSubString();
        $this->assertRegExp('/[a-z]{24}/', $value);
        $this->assertTrue(strpos('abcdefghijklmnopqrstuvwxyz', $value) !== false);
    }
} 