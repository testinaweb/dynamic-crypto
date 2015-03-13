<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 13/03/15
 * Time: 23:09
 */

namespace DynamicCrypto;


class DynamicCrypto {

    protected $passphrase;

    protected $bit_check = 8;

    public function __construct($passphrase)
    {
        $this->passphrase = $passphrase;
    }

    public function encrypt($text)
    {
        $superkey =  base64_encode(hash('sha512',$this->passphrase));
        $superkey_len = strlen($superkey);
        $idx_key = rand(0,($superkey_len-24));
        $idx_iv = rand(0,($superkey_len-8));
        $key = substr($superkey,$idx_key,24);
        $iv = substr($superkey,$idx_iv,8);
        $idx_hex_key = str_pad(dechex($idx_key),2,'0',STR_PAD_LEFT);
        $idx_hex_iv = str_pad(dechex($idx_iv),2,'0',STR_PAD_LEFT);

        $text_num =str_split($text,$this->bit_check);
        $text_num = $this->bit_check-strlen($text_num[count($text_num)-1]);
        for ($i=0;$i<$text_num; $i++) {$text = $text . '_';}
        $cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'',MCRYPT_MODE_CBC,'');
        mcrypt_generic_init($cipher, $key, $iv);
        $decrypted = mcrypt_generic($cipher,$text);
        mcrypt_generic_deinit($cipher);
        return rtrim(base64_encode($decrypted),'=').$idx_hex_key.$idx_hex_iv;
    }

    public function decrypt($encrypted_text)
    {
        $superkey =  base64_encode(hash('sha512',$this->passphrase));
        $idx_hex_iv = substr($encrypted_text,-2);
        $idx_hex_key = substr($encrypted_text,-4,2);
        $idx_iv = hexdec($idx_hex_iv);
        $idx_key = hexdec($idx_hex_key);
        $iv = substr($superkey,$idx_iv,8);
        $key =  substr($superkey,$idx_key,24);
        $encrypted_text = substr($encrypted_text,0,-4);

        $cipher = mcrypt_module_open(MCRYPT_TRIPLEDES,'',MCRYPT_MODE_CBC,'');
        mcrypt_generic_init($cipher, $key, $iv);
        $decrypted = mdecrypt_generic($cipher,base64_decode($encrypted_text));
        mcrypt_generic_deinit($cipher);
        /*$last_char=substr($decrypted,-1);
        for($i=0;$i<$bit_check-1; $i++){
            if(chr($i)==$last_char){
                $decrypted=substr($decrypted,0,strlen($decrypted)-$i);
                break;
            }
        }*/
        $decrypted = rtrim($decrypted,'_');
        return $decrypted;
    }
} 