<?php

namespace DynamicCrypto;

class DynamicDecrypter
{
    use MCryptTrait;

    /**
     * @var Key
     */
    protected $key;

    /**
     * @var IV
     */
    protected $IV;

    /**
     * @var StringFormatter
     */
    protected $stringFormatter;

    /**
     * @param Parameter $key
     * @param Parameter $IV
     * @param StringFormatter $stringFormatter
     */
    public function __construct(Parameter $key, Parameter $IV, StringFormatter $stringFormatter)
    {
        $this->key = $key;
        $this->IV = $IV;
        $this->stringFormatter = $stringFormatter;
    }

    /**
     * @param $encrypted_text
     * @return string
     */
    public function decrypt($encrypted_text)
    {
        $this->IV->setHexadecimalPosition(substr($encrypted_text,-2));
        $this->key->setHexadecimalPosition(substr($encrypted_text,-4,2));

        $encrypted_text = substr($encrypted_text,0,-4);

        $this->encryptInit();
        $decrypted = mdecrypt_generic($this->getEncryptionDescriptor(), base64_decode($encrypted_text));
        $this->encryptDeinit();

        $decrypted = $this->stringFormatter->cleanString($decrypted);
        return $decrypted;
    }

} 