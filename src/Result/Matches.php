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


class Matches
{
    /**
     * Create new instance
     *
     * @param array $matches
     * @return Matches
     */
    public static function createInstance(array $matches)
    {
        $self = new self;
        $self->matches = $matches;
        return $self;
    }

    /**
     * Contains the matches
     *
     * @var array
     */
    protected $matches = array();

    /**
     * Get the matches
     *
     * @return array
     */
    public function matches()
    {
        return $this->matches;
    }

    /**
     * Get grouped match
     *
     * @param int $group
     * @return mixed|null
     */
    public function group(int $group)
    {
        if(isset($this->matches[$group])) {
            return $this->matches[$group];
        }

        return null;
    }

    /**
     * Get grouped match
     *
     * @param string $group
     * @return mixed|null
     */
    public function namedGroup(string $group)
    {
        if(isset($this->matches[$group])) {
            return $this->matches[$group];
        }

        return null;
    }

    /**
     * Map matches by function
     *
     * @param callable $callback
     * @return array
     */
    public function map(callable $callback)
    {
        return array_map($callback, $this->matches);
    }

    /**
     * Merge the object to string
     *
     * @return string
     */
    public function merge()
    {
        return implode($this->matches);
    }

    /**
     * Get count
     *
     * @return int
     */
    public function count()
    {
        return count($this->matches);
    }
}