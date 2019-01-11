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

namespace Shopbase\Regex\Process;

use Shopbase\Regex\Process\Functions,
    Shopbase\Regex\Result\Result;

class Process extends Functions
{
    public static $TYPE_MATCH = 'match';
    public static $TYPE_MATCH_ALL = 'matchAll';
    public static $TYPE_REPLACE = 'replace';
    public static $TYPE_GREP = 'grep';
    public static $TYPE_FILTER = 'filter';
    public static $TYPE_SPLIT = 'split';

    /**
     * Process the request
     *
     * @param string $type
     * @param string $pattern
     * @param string $subject
     * @param string $replacement
     * @param int $limit
     * @return Result
     */
    public function process(string $type, string $pattern, string $subject, string $replacement = '', int $limit = 0) : Result
    {
        $this->type = $type;
        $this->pattern = $pattern;
        $this->subject = $subject;
        $this->replacement = $replacement;
        $this->limit = $limit;

        $this->$type();

        return $this->mapToResult();
    }

    /**
     * Process the request
     *
     * @param string $type
     * @param string $pattern
     * @param array $subject
     * @return Result
     */
    public function grepProcess(string $type, string $pattern, array $subject) : Result
    {
        $this->type = $type;
        $this->pattern = $pattern;
        $this->subject = $subject;

        $this->$type();

        return $this->mapToResult();
    }

    /**
     * Process the request
     *
     * @param string $type
     * @param array $pattern
     * @param array $subject
     * @param array $replacement
     * @return Result
     */
    public function filterProcess(string $type, array $pattern, array $subject, array $replacement) : Result
    {
        $this->type = $type;
        $this->pattern = $pattern;
        $this->subject = $subject;
        $this->replacement = $replacement;

        $this->$type();

        return $this->mapToResult();
    }
}