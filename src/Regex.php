<?php
/**
 * Regex
 * Copyright (c) 2019 Shopbase
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0.0
 * @package de.themepoint.php.components.regex
 *
 */

namespace Shopbase\Regex;

use Shopbase\Regex\Process\Process,
    Shopbase\Regex\Result\Result;

class Regex
{
    /**
     * PHP Preg_Match
     *
     * @param string $pattern
     * @param string $subject
     * @param array $flags
     * @param int $offset
     * @return Result
     */
    public static function match(string $pattern, string $subject, array $flags = array(), int $offset = 0) : Result
    {
        return (new Process())->process(Process::$TYPE_MATCH, $pattern, $subject, '', 0, $flags, $offset);
    }

    /**
     * PHP Preg_Match_All
     *
     * @param string $pattern
     * @param string $subject
     * @param array $flags
     * @param int $offset
     * @return Result
     */
    public static function matchAll(string $pattern, string $subject, array $flags = array(), int $offset = 0) : Result
    {
        return (new Process())->process(Process::$TYPE_MATCH_ALL, $pattern, $subject, '', 0, $flags, $offset);
    }

    /**
     * PHP Preg_Replace
     *
     * @param string $pattern
     * @param string $subject
     * @param string $replacement
     * @param int $limit
     * @return Result
     */
    public static function replace(string $pattern, string $subject, string $replacement, int $limit = 0) : Result
    {
        return (new Process())->process(Process::$TYPE_REPLACE, $pattern, $subject, $replacement, $limit);
    }

    /**
     * PHP Preg_Replace
     *
     * @param string $pattern
     * @param string $subject
     * @param int $limit
     * @param array $flags
     * @return Result
     */
    public static function split(string $pattern, string $subject, int $limit = 0, array $flags = array()) : Result
    {
        return (new Process())->process(Process::$TYPE_SPLIT, $pattern, $subject, '', $limit, $flags);
    }

    /**
     * PHP Preg_Grep
     *
     * @param string $pattern
     * @param array $subject
     * @param array $flags
     * @return Result
     */
    public static function grep(string $pattern, array $subject, array $flags = array()) : Result
    {
        return (new Process())->grepProcess(Process::$TYPE_GREP, $pattern, $subject, $flags);
    }

    /**
     * PHP Preg_Grep
     *
     * @param array $pattern
     * @param array $subject
     * @param array $replacement
     * @param int $limit
     * @return Result
     */
    public static function filter(array $pattern, array $subject, array $replacement, int $limit = -1) : Result
    {
        return (new Process())->filterProcess(Process::$TYPE_FILTER, $pattern, $subject, $replacement, $limit);
    }

    /**
     * Validate a expression
     *
     * @param string $expression
     * @return string
     */
    public static function validateExpression(string $expression) : string
    {
        return preg_quote($expression);
    }

    /**
     * Validate a expression
     *
     * Same as validateExpression function
     *
     * @param string $expression
     * @return string
     */
    public static function quote(string $expression) : string
    {
        return self::validateExpression($expression);
    }
}