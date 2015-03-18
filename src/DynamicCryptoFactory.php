<?php

namespace DynamicCrypto;

class DynamicCryptoFactory {

    /**
     * @param string $passPhrase
     * @return DynamicEncrypter
     */
    public static function buildDynamicEncrypter ($passPhrase)
    {
        $passPhraseInstance = new PassPhrase($passPhrase);

        $key = new Parameter($passPhraseInstance, 24);
        $IV = new Parameter($passPhraseInstance, 8);
        $stringFormatter = new StringFormatter();

        return new DynamicEncrypter($key, $IV, $stringFormatter);
    }

    /**
     * @param string $passPhrase
     * @return DynamicDecrypter
     */
    public static function buildDynamicDecrypter ($passPhrase)
    {
        $passPhraseInstance = new PassPhrase($passPhrase);

        $key = new Parameter($passPhraseInstance, 24);
        $IV = new Parameter($passPhraseInstance, 8);
        $stringFormatter = new StringFormatter();

        return new DynamicDecrypter($key, $IV, $stringFormatter);
    }
} 