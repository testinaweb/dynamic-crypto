<?php

namespace DynamicCrypto;

class DynamicEncrypter
{
    use MCryptTrait;

    /**
     * @var Key
     */
    protected $key;

    /**
     * @var IV
     */
    protected $IV;

    /**
     * @var StringFormatter
     */
    protected $stringFormatter;

    /**
     * @param Parameter $key
     * @param Parameter $IV
     * @param StringFormatter $stringFormatter
     */
    public function __construct(Parameter $key, Parameter $IV, StringFormatter $stringFormatter)
    {
        $this->key = $key;
        $this->IV = $IV;
        $this->stringFormatter = $stringFormatter;
    }

    /**
     * @param $text
     * @return string
     */
    public function encrypt($text)
    {
        $encrypted = $this->mcrypt($this->stringFormatter->prepareString($text));

        return rtrim(base64_encode($encrypted), '=')
        .$this->key->getRandomHexadecimalPosition()
        .$this->IV->getRandomHexadecimalPosition();
    }

    /**
     * @param string $string
     * @return string
     */
    private function mcrypt($string)
    {
        $this->encryptInit();
        $encrypted = mcrypt_generic($this->getEncryptionDescriptor(), $string);
        $this->encryptDeinit();

        return $encrypted;
    }
}