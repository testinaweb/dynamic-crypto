<?php

use DynamicCrypto\PassPhrase;

class PassPhraseTest extends PHPUnit_Framework_TestCase
{
    private $passPhrase;

    public function setUp()
    {
        $this->passPhrase = new PassPhrase('abcd');
    }

    public function testSetPassPhrase()
    {
        $this->passPhrase->setPassPhrase('efgh');
        $this->assertEquals('efgh', $this->passPhrase->getPassPhrase());
    }

    public function testGetPassPhrase()
    {
        $this->assertEquals('abcd', $this->passPhrase->getPassPhrase());
    }

    public function testGetSuperKey()
    {
        $this->assertEquals(
            'ZDgwMjJmMjA2MGFkNmVmZDI5N2FiNzNkY2M1MzU1YzliMjE0MDU0YjBkMTc3NmExMzZhNjY5ZDI2YTdkM2IxNGY3M2FhMGQwZWJmZjE5ZWUzMzMzNjhmMDE2NGI2NDE5YTk2ZGE0OWUzZTQ4MTc1M2U3ZTk2YjcxNmJkY2NiNmY=',
            base64_encode(hash('sha512',$this->passPhrase->getPassPhrase()))
        );
    }

    public function testGetSuperKeyLen()
    {
        $this->assertEquals(172, $this->passPhrase->getSuperKeyLen());
    }
}