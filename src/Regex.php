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
     * @return Result
     */
    public static function match(string $pattern, string $subject) : Result
    {
        return (new Process())->process(Process::$TYPE_MATCH, $pattern, $subject);
    }

    /**
     * PHP Preg_Match_All
     *
     * @param string $pattern
     * @param string $subject
     * @return Result
     */
    public static function matchAll(string $pattern, string $subject) : Result
    {
        return (new Process())->process(Process::$TYPE_MATCH_ALL, $pattern, $subject);
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
     * @return Result
     */
    public static function split(string $pattern, string $subject, int $limit = 0) : Result
    {
        return (new Process())->process(Process::$TYPE_SPLIT, $pattern, $subject, '', $limit);
    }

    /**
     * PHP Preg_Grep
     *
     * @param string $pattern
     * @param array $subject
     * @return Result
     */
    public static function grep(string $pattern, array $subject) : Result
    {
        return (new Process())->grepProcess(Process::$TYPE_GREP, $pattern, $subject);
    }

    /**
     * PHP Preg_Grep
     *
     * @param array $pattern
     * @param array $subject
     * @param array $replacement
     * @return Result
     */
    public static function filter(array $pattern, array $subject, array $replacement) : Result
    {
        return (new Process())->filterProcess(Process::$TYPE_FILTER, $pattern, $subject, $replacement);
    }

    /**
     * Validate a expression
     *
     * @param string $expression
     * @return string
     */
    public static function validateExpression(string $expression)
    {
        return preg_quote($expression);
    }
}