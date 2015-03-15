<?php

namespace DynamicCrypto;

class DynamicEncrypt extends DynamicMCrypt
{
    /**
     * @param $text
     * @return string
     */
    public function encrypt($text)
    {
        $this->encryptInit();
        $encrypted = mcrypt_generic($this->getEncryptionDescriptor(), $this->stringFormatter->prepareString($text));
        $this->encryptDeinit();

        return rtrim(base64_encode($encrypted), '=')
        .$this->key->getRandomHexadecimalPosition()
        .$this->IV->getRandomHexadecimalPosition();
    }

}