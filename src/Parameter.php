<?php

namespace DynamicCrypto;


abstract class Parameter
{

    /**
     * @var PassPhrase
     */
    protected $passPhrase;

    protected $randomPosition;

    protected $maxRandomValue;

    protected $parameterLength = 0;

    public function __construct(PassPhrase $passPhrase)
    {
        $this->passPhrase = $passPhrase;
        $this->maxRandomValue = $this->passPhrase->getSuperKeyLen() - $this->parameterLength;
    }

    public function getRandomDecimalPosition()
    {
        return $this->randomPosition ? : rand(0, $this->maxRandomValue);
    }

    public function getRandomHexadecimalPosition()
    {
        return str_pad(dechex($this->getRandomDecimalPosition()), 2, '0', STR_PAD_LEFT);
    }

    public function getSubString()
    {
        return substr($this->passPhrase->getSuperKey(), $this->getRandomDecimalPosition(), $this->parameterLength);
    }

} 