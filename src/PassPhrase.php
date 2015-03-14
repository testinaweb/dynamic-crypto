<?php

namespace DynamicCrypto;

class PassPhrase
{

    protected $passPhrase;

    public function __construct($passPhrase)
    {
        $this->passPhrase = $passPhrase;
    }

    public function getPassPhrase()
    {
        return $this->passPhrase;
    }

    public function getSuperKey()
    {
        return base64_encode(hash('sha512',$this->getPassPhrase()));
    }

    public function getSuperKeyLen()
    {
        return strlen($this->getSuperKey());
    }
} 