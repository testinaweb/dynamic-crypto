<?php

use DynamicCrypto\StringFormatter;

class StringFormatterTest extends PHPUnit_Framework_TestCase
{
    private $stringFormatter;

    public function setUp()
    {
        $this->stringFormatter = new StringFormatter();
    }

    /**
     * @dataProvider provider
     */
    public function testPrepareString($input, $aspected)
    {
        $this->assertEquals($aspected, $this->stringFormatter->prepareString($input));
    }

    /**
     * @dataProvider provider
     */
    public function testCleanString($aspected, $input)
    {
        $this->assertEquals($aspected, $this->stringFormatter->cleanString($input));
    }

    public function provider()
    {
        return array(
            array('abcd', 'abcd____'),
            array('abcdefgh', 'abcdefgh'),
            array('abcdefghi', 'abcdefghi_______'),
            array('abcdefghijlkmno', 'abcdefghijlkmno_'),
        );
    }
}