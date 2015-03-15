<?php
/**
 * Created by PhpStorm.
 * User: manuel
 * Date: 15/03/15
 * Time: 16:56
 */

namespace DynamicCrypto;


abstract class DynamicMCrypt
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

    public function __construct($passphrase)
    {
        $passphrase = new PassPhrase($passphrase);
        $this->key = new Key($passphrase);
        $this->IV = new IV($passphrase);
        $this->stringFormatter = new StringFormatter();
    }

} 