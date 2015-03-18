<?php

namespace DynamicCrypto;

Trait MCryptTrait {
    /**
     * @var
     */
    protected $encryptionDescriptor = null;

    /**
     * Initialization of mcrypt
     */
    public function encryptInit()
    {
        mcrypt_generic_init($this->getEncryptionDescriptor(), $this->key->getSubString(), $this->IV->getSubString());
    }

    /**
     * Close mcrypt
     */
    public function encryptDeinit()
    {
        mcrypt_generic_deinit($this->getEncryptionDescriptor());
        mcrypt_module_close($this->getEncryptionDescriptor());
    }

    /**
     * Generate encryption descriptor
     *
     * @return resource
     */
    public function getEncryptionDescriptor()
    {
        if (is_null($this->encryptionDescriptor)) {
            $this->encryptionDescriptor = mcrypt_module_open(MCRYPT_TRIPLEDES,'',MCRYPT_MODE_CBC,'');
        }
        return $this->encryptionDescriptor;
    }
} 