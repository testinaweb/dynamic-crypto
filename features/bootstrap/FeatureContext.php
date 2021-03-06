<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use DynamicCrypto\DynamicCryptoFactory;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{

    protected $passPhrase = 'ILoveDC';

    protected $string;

    protected $encryptedString;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given A string :string
     */
    public function aString($string)
    {
        $this->string = $string;
    }

    /**
     * @Then I want an encrypted string back
     */
    public function iWantAnEncryptedStringBack()
    {
        $dynamicEncrypter = DynamicCryptoFactory::buildDynamicEncrypter($this->passPhrase);
        $this->encryptedString = $dynamicEncrypter->encrypt($this->string);
        PHPUnit_Framework_TestCase::assertNotEquals(
            $this->encryptedString,
            $this->string
        );
        echo $this->encryptedString;
    }

    /**
     * @Then I want my original string again
     */
    public function iWantMyOriginalStringAgain()
    {
        $dynamicDecrypter = DynamicCryptoFactory::buildDynamicDecrypter($this->passPhrase);
        $decryptedString = $dynamicDecrypter->decrypt($this->encryptedString);
        PHPUnit_Framework_TestCase::assertEquals(
            $decryptedString,
            $this->string
        );
        echo $decryptedString;
    }
}
