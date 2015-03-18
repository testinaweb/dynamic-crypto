<?php

namespace DynamicCrypto;

class StringFormatter
{
    /*
     * Constants
     */
    const FILLER = '_';
    const BITCHECK = 8;

    /**
     * @param $string
     * @return string
     */
    public function prepareString($string)
    {
        return str_pad($string, $this->provideStringLength($string) , self::FILLER);
    }

    /**
     * @param $string
     * @return int
     */
    private function provideStringLength($string)
    {
        $stringLength = strlen($string);
        $lengthGap = self::BITCHECK - ($stringLength % self::BITCHECK);
        if ($lengthGap < self::BITCHECK) {
            $stringLength += $lengthGap;
        }
        return $stringLength;
    }

    /**
     * @param $string
     * @return string
     */
    public function cleanString($string)
    {
        return rtrim($string, self::FILLER);
    }
} 