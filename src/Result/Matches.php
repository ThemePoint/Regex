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
    public static function createInstance(array $matches) : Matches
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
    public function matches() : array
    {
        return $this->matches;
    }

    /**
     * Get grouped match
     *
     * @param int $group
     * @param array $subgroups
     * @return mixed|null
     */
    public function group(int $group, array $subgroups = array())
    {
        if(isset($this->matches[$group]) && count($subgroups) === 0) {
            return $this->matches[$group];
        }

        if(isset($this->matches[$group]) && count($subgroups) > 0 && is_array($this->matches[$group])) {
            $result = $this->matches[$group];
            foreach($subgroups as $subgroup) {
                if(isset($result[$subgroup])) {
                    $result = $result[$subgroup];

                    if(!is_array($result)) {
                        return $result;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Get multiple grouped matches
     *
     * @param array $groups
     * @return array|null
     */
    public function groups(array $groups)
    {
        $functionResult = array();

        foreach($groups as $group) {
            if(is_array($group)) {
                $result = $this->matches;
                $isAdded = false;
                foreach($group as $subgroup) {
                    if(isset($result[$subgroup]) && !$isAdded) {
                        $result = $result[$subgroup];

                        if(!is_array($result)) {
                            array_push($functionResult, $result);
                            $isAdded = true;
                        }
                    }
                }

                if(!$isAdded) {
                    array_push($functionResult, $result);
                }
            } elseif(is_int($group)) {
                array_push($functionResult, $this->matches[$group]);
            }
        }

        if(count($functionResult) > 0) {
            return $functionResult;
        }

        return null;
    }

    /**
     * Get grouped match
     *
     * @param string $group
     * @param array $subgroups
     * @return mixed|null
     */
    public function namedGroup(string $group, array $subgroups = array())
    {
        if(isset($this->matches[$group])) {
            return $this->matches[$group];
        }

        if(isset($this->matches[$group]) && count($subgroups) > 0 && is_array($this->matches[$group])) {
            $result = $this->matches[$group];
            foreach($subgroups as $subgroup) {
                if(isset($result[$subgroup])) {
                    $result = $result[$subgroup];

                    if(!is_array($result)) {
                        return $result;
                    }
                }
            }
        }

        return null;
    }

    /**
     * Get multiple grouped matches
     *
     * @param array $groups
     * @return array|null
     */
    public function namedGroups(array $groups)
    {
        $functionResult = array();

        foreach($groups as $group) {
            if(is_array($group)) {
                $result = $this->matches;
                $isAdded = false;
                foreach($group as $subgroup) {
                    if(isset($result[$subgroup]) && !$isAdded) {
                        $result = $result[$subgroup];

                        if(!is_array($result)) {
                            array_push($functionResult, $result);
                            $isAdded = true;
                        }
                    }
                }

                if(!$isAdded) {
                    array_push($functionResult, $result);
                }
            } elseif(is_int($group)) {
                array_push($functionResult, $this->matches[$group]);
            }
        }

        if(count($functionResult) > 0) {
            return $functionResult;
        }

        return null;
    }

    /**
     * Map matches by function
     *
     * @param callable $callback
     * @return array
     */
    public function map(callable $callback) : array
    {
        return array_map($callback, $this->matches);
    }

    /**
     * Merge the object to string
     *
     * @return string
     */
    public function merge() : string
    {
        return implode($this->matches);
    }

    /**
     * Get count
     *
     * @return int
     */
    public function count() : int
    {
        return count($this->matches);
    }
}