<?php

namespace stmswitcher\excuseme;

/**
 * Excuse class
 *
 * What it does is returns you random excuse made by programmers when your
 * script is not works as it should.
 *
 * The easiest way to get a message is create a class' instance and call {@see forCode()}
 * method:
 *
 * ```php
 * $exuseme = new ExcuseMe;
 * echo $excuseme->forCode(500);
 * ```
 *
 * @namespace stmswitcher\excuseme
 * @file ExcuseMe.php
 *
 * @author Denis Alexandrov <stm.switcher@gmail.com>
 * @date 03.02.2016 18:24:20
 * @url https://github.com/stmswitcher/excuseme
 * @license https://opensource.org/licenses/MIT MIT
 */

class ExcuseMe
{
    /** Default locale to use if specified one not found */
    const DEFAULT_LOCALE = 'en';

    /** Default error code to use if specified one not found */
    const DEFAULT_CODE   = 500;

    /** @var string The locale to use */
    private $locale;

    /** @var string Path to messages folder */
    private $messages_folder;

    /**
     * Constructs the class instance and sets the locale
     *
     * @param string $locale Locale to generate a message. EN by default
     */
    public function __construct($locale = self::DEFAULT_LOCALE)
    {
        $this->messages_folder = __DIR__ . "/messages/$locale/";

        if (!file_exists($this->messages_folder))
            $this->locale = self::DEFAULT_LOCALE;

        $this->locale = $locale;
    }

    /**
     * Returns string with a random excuse for error code $code
     *
     * @param int $code Error code. 500 by default
     * @return string Message
     */
    public function forCode($code = self::DEFAULT_CODE)
    {
        if (!file_exists($this->messages_folder . "Code_$code.php"))
            $code = self::DEFAULT_CODE;

        $messages = require($this->messages_folder . "Code_$code.php");

        return $messages[array_rand($messages)];
    }

    /**
     * Get random excuse message for error code $code and $locale without
     * class instance.
     *
     * @param string $locale EN by default
     * @param int $code 500 by default
     * @return string
     */
    public static function getMessage($locale = self::DEFAULT_LOCALE, $code = self::DEFAULT_CODE)
    {
        $locale = strtolower($locale);

        if (!file_exists(__DIR__ . "/messages/$locale/"))
            $locale = self::DEFAULT_LOCALE;

        if (!file_exists(__DIR__ . "/messages/$locale/Code_$code.php"))
            $code = self::DEFAULT_CODE;

        $messages = require(__DIR__ . "/messages/$locale/Code_$code.php");

        return $messages[array_rand($messages)];
    }
}