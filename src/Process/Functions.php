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

use Shopbase\Regex\Process\Variables,
    Shopbase\Regex\Result\Result,
    Shopbase\Regex\Result\Matches;

class Functions extends Variables
{
    /**
     * Match function
     */
    protected function match()
    {
        $matches = [];
        $result = null;

        try {
            $result = preg_match($this->pattern, $this->subject, $matches);
        } catch (\Exception $exception) {
            echo "PHP Regex failed. Reason: " . $exception->getMessage();
        }

        if($result === false) {
            echo "PHP Regex failed";
        }

        $this->matches = $matches;
    }

    /**
     * Match all function
     */
    protected function matchAll()
    {
        $matches = [];
        $result = null;

        try {
            $result = preg_match_all($this->pattern, $this->subject, $matches);
        } catch (\Exception $exception) {
            echo "PHP Regex failed. Reason: " . $exception->getMessage();
        }

        if($result === false) {
            echo "PHP Regex failed";
        }

        $this->matches = $matches;
    }

    /**
     * Replace function
     */
    protected function replace()
    {
        $count = 0;

        $result = preg_replace($this->pattern, $this->replacement, $this->subject, $this->limit, $count);

        $this->matches = $result;
        $this->count = $count;
    }

    /**
     * Grep function
     */
    protected function grep()
    {
        $result = preg_grep($this->pattern, $this->subject);

        $this->matches = $result;
    }

    /**
     * Grep function
     */
    protected function filter()
    {
        $result = preg_filter($this->pattern, $this->replacement, $this->subject);

        $this->matches = $result;
    }

    /**
     * Grep function
     */
    protected function split()
    {
        $result = preg_split($this->pattern, $this->subject, $this->limit);

        $this->matches = $result;
    }

    /**
     * Map process results to result
     *
     * @return Result
     */
    protected function mapToResult() : Result
    {
        $hasMatches = count($this->matches) ? true : false;

        if(!is_array($this->matches)) {
            $this->matches = array($this->matches);
        }

        return (new Result())->setHasMatches($hasMatches)->setMatches(Matches::createInstance($this->matches));
    }
}