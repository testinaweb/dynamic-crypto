<?php

namespace DynamicCrypto;

Trait MCryptTrait {
    /**
     * @var
     */
    private $encryptionDescriptor = null;

    /**
     * Initialization of mcrypt
     */
    private function encryptInit()
    {
        mcrypt_generic_init($this->getEncryptionDescriptor(), $this->key->getSubString(), $this->IV->getSubString());
    }

    /**
     * Close mcrypt
     */
    private function encryptDeinit()
    {
        mcrypt_generic_deinit($this->getEncryptionDescriptor());
        mcrypt_module_close($this->getEncryptionDescriptor());
    }

    /**
     * Generate encryption descriptor
     *
     * @return resource
     */
    private function getEncryptionDescriptor()
    {
        if (is_null($this->encryptionDescriptor)) {
            $this->encryptionDescriptor = mcrypt_module_open(MCRYPT_TRIPLEDES,'',MCRYPT_MODE_CBC,'');
        }
        return $this->encryptionDescriptor;
    }

    /**
     * Reset the encryption descriptor to start a new encryption
     */
    private function resetEncryptionDescriptor()
    {
        $this->encryptionDescriptor = null;
    }

    /**
     * Reset parameters to make the parameter create a new key
     */
    private function resetParameters()
    {
        $this->key->reset();
        $this->IV->reset();
    }

    /**
     * Wrapper to reset mcrypt and parameters
     */
    private function resetCurrentProcess()
    {
        $this->resetEncryptionDescriptor();
        $this->resetParameters();
    }
} 