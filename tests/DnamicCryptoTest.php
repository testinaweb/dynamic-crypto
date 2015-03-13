<?php

use DynamicCrypto\DynamicCrypto;

class DynamicCryptoTest extends PHPUnit_Framework_TestCase
{
    public function testTest()
    {
        $passphrase = 'ILoveSol';
        $dynamicCrypto = new DynamicCrypto($passphrase);
        //$key = substr(base64_encode(md5('ILoveSol')),0,24);//"E4HD9h4DhS23DYfhHemkS3Nf";// 24 bit Key
//$iv = substr(base64_encode(md5('ILoveSol')),24,8);// 8 bit IV
        $input = "1928329323##pincopallino@gmail.com##pallcsd222asddasdf asdf asdf asf asfas fdasdasdasdino##24##it";// text to encrypt
//echo $key."\n";
//echo $iv."\n";
//echo base64_encode(md5('ILoveSol'))."\n";

//echo $superkey." - ".strlen($superkey)."\n";
//echo hash('sha512','ILoveSol')." - ".strlen(hash('sha512','ILoveSol'))."\n";
        //$passphrase = 'ILoveSol';
        //echo $passphrase."\n";
        $str= $dynamicCrypto->encrypt($input);
        //echo "Start: $input - Excrypted: $str - Decrypted: ".decrypt($str,$passphrase)."\n";

        $this->assertEquals($dynamicCrypto->decrypt($str), $input);
    }
}
?>