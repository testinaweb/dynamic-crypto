<?php

use DynamicCrypto\StringFormatter;

class StringFormatterTest extends PHPUnit_Framework_TestCase
{
    private $stringFormatter;

    public function setUp()
    {
        $this->stringFormatter = new StringFormatter();
    }

    public function testPrepareString()
    {
        $this->assertEquals('abcd____', $this->stringFormatter->prepareString('abcd'));
    }

    public function testCleanString()
    {
        $this->assertEquals('abcb', $this->stringFormatter->cleanString('abcb____'));
    }
}