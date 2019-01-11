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

namespace Shopbase\Regex\Result;

use Shopbase\Regex\Result\Matches;

class Result
{
    /**
     * Contains the matches
     *
     * @var Matches
     */
    protected $matches;

    /**
     * Contains the hasMatches status
     *
     * @var bool
     */
    protected $hasMatches;

    /**
     * Set matches
     *
     * @param \Shopbase\Regex\Result\Matches $matches
     * @return Result
     */
    public function setMatches(Matches $matches) : Result
    {
        $this->matches = $matches;
        return $this;
    }

    /**
     * Get matches
     *
     * @return \Shopbase\Regex\Result\Matches
     */
    public function getMatches()
    {
        return $this->matches;
    }

    /**
     * Set hasMatches
     *
     * @param bool $hasMatches
     * @return Result
     */
    public function setHasMatches(bool $hasMatches) : Result
    {
        $this->hasMatches = $hasMatches;
        return $this;
    }

    /**
     * Get hasMatches
     *
     * @return bool
     */
    public function getHasMatches()
    {
        return $this->hasMatches;
    }
}