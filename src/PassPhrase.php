<?php

namespace DynamicCrypto;

class PassPhrase
{
    /**
     * @var string
     */
    protected $passPhrase;

    /**
     * @param $passPhrase
     */
    public function __construct($passPhrase)
    {
        $this->setPassPhrase($passPhrase);
    }

    /**
     * @param $passPhrase
     */
    public function setPassPhrase($passPhrase)
    {
        $this->passPhrase = $passPhrase;
    }

    /**
     * @return string
     */
    public function getPassPhrase()
    {
        return $this->passPhrase;
    }

    /**
     * @return string
     */
    public function getSuperKey()
    {
        return base64_encode(hash('sha512',$this->getPassPhrase()));
    }

    /**
     * @return int
     */
    public function getSuperKeyLen()
    {
        return strlen($this->getSuperKey());
    }
} 