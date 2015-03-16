<?php

namespace DynamicCrypto;

class DynamicCryptoFactory {

    public static function buildDynamicEncrypter ($passPhrase)
    {
        $passPhraseInstance = new PassPhrase($passPhrase);

        $key = new Parameter($passPhraseInstance, 24);
        $IV = new Parameter($passPhraseInstance, 8);
        $stringFormatter = new StringFormatter();

        return new DynamicEncrypter($key, $IV, $stringFormatter);
    }

    public static function buildDynamicDecrypter ($passPhrase)
    {
        $passPhraseInstance = new PassPhrase($passPhrase);

        $key = new Parameter($passPhraseInstance, 24);
        $IV = new Parameter($passPhraseInstance, 8);
        $stringFormatter = new StringFormatter();

        return new DynamicDecrypter($key, $IV, $stringFormatter);
    }
} 