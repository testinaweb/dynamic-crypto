<?php

namespace DynamicCrypto;

class DynamicCrypto
{

    /**
     * @var Key
     */
    protected $key;

    /**
     * @var IV
     */
    protected $IV;

    protected $passphrase;

    /**
     * @var int
     */
    protected $bit_check = 8;

    public function __construct($passphrase)
    {
        $this->passphrase = new PassPhrase($passphrase);
        $this->key = new Key($this->passphrase);
        $this->IV = new IV($this->passphrase);
    }

    public function encrypt($text)
    {
        $encryptionDescriptor = $this->getEncryptionDescriptor();
        mcrypt_generic_init($encryptionDescriptor, $this->key->getSubString(), $this->IV->getSubString());
        $encrypted = mcrypt_generic($encryptionDescriptor, $this->prepareString($text));
        mcrypt_generic_deinit($encryptionDescriptor);
        mcrypt_module_close($encryptionDescriptor);

        return rtrim(base64_encode($encrypted), '=')
            .$this->key->getRandomHexadecimalPosition()
            .$this->IV->getRandomHexadecimalPosition();
    }

    public function getEncryptionDescriptor()
    {
        return mcrypt_module_open(MCRYPT_TRIPLEDES,'',MCRYPT_MODE_CBC,'');
    }

    public function prepareString($string)
    {
        $text_num = str_split($string, $this->bit_check);
        $text_num = $this->bit_check - strlen($text_num[count($text_num)-1]);
        for ($i = 0; $i < $text_num; $i++) {
            $string = $string . '_';
        }
        return $string;
    }

    public function cleanString($string)
    {
        return rtrim($string, '_');
    }

    public function decrypt($encrypted_text)
    {
        $idx_hex_iv = substr($encrypted_text,-2);
        $idx_hex_key = substr($encrypted_text,-4,2);
        $idx_iv = hexdec($idx_hex_iv);
        $idx_key = hexdec($idx_hex_key);
        $iv = substr($this->passphrase->getSuperKey(),$idx_iv,8);
        $key =  substr($this->passphrase->getSuperKey(),$idx_key,24);
        $encrypted_text = substr($encrypted_text,0,-4);

        $encryptionDescriptor = $this->getEncryptionDescriptor();
        mcrypt_generic_init($encryptionDescriptor, $key, $iv);
        $decrypted = mdecrypt_generic($encryptionDescriptor,base64_decode($encrypted_text));
        mcrypt_generic_deinit($encryptionDescriptor);
        mcrypt_module_close($encryptionDescriptor);

        $decrypted = $this->cleanString($decrypted);
        return $decrypted;
    }
} 