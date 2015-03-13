<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 13/03/15
 * Time: 23:04
 */

namespace DynamicCrypto;

class NumberConverter {

    public function decimalToHexadecimal(int $number)
    {
        return dechex($number);
    }

    public function hexadecimalToDecimal(string $hex_string)
    {
        return hexdec($hex_string);
    }
} 