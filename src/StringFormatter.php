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
        $text_num = str_split($string, self::BITCHECK);
        $text_num = self::BITCHECK - strlen($text_num[count($text_num)-1]);
        for ($i = 0; $i < $text_num; $i++) {
            $string = $string . self::FILLER;
        }
        return $string;
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