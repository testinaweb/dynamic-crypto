<?php

namespace DynamicCrypto;


abstract class Parameter
{

    /**
     * @var PassPhrase
     */
    protected $passPhrase;

    /**
     * @var int
     */
    protected $randomPosition = null;

    /**
     * @var int
     */
    protected $maxRandomValue;

    /**
     * @var int
     */
    protected $parameterLength = 0;

    /**
     * @param PassPhrase $passPhrase
     */
    public function __construct(PassPhrase $passPhrase)
    {
        $this->passPhrase = $passPhrase;
        $this->maxRandomValue = $this->passPhrase->getSuperKeyLen() - $this->parameterLength;
    }

    /**
     * @return int
     */
    public function getRandomDecimalPosition()
    {
        if (is_null($this->randomPosition)) {
            $this->randomPosition = rand(0, $this->maxRandomValue);
        }
        return $this->randomPosition;
    }

    /**
     * @return string
     */
    public function getRandomHexadecimalPosition()
    {
        return str_pad(dechex($this->getRandomDecimalPosition()), 2, '0', STR_PAD_LEFT);
    }

    /**
     * @return string
     */
    public function getSubString()
    {
        return substr($this->passPhrase->getSuperKey(), $this->getRandomDecimalPosition(), $this->parameterLength);
    }

} 