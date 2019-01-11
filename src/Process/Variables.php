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

class Variables
{
    /**
     * Contains the subject
     *
     * @var string|array
     */
    protected $subject;

    /**
     * Contains the pattern
     *
     * @var string|array
     */
    protected $pattern;

    /**
     * Contains the matches
     *
     * @var array
     */
    protected $matches;

    /**
     * Contains the type
     *
     * @var string
     */
    protected $type;

    /**
     * Contains the replacement
     *
     * @var string|array
     */
    protected $replacement;

    /**
     * Contains the limit
     *
     * @var int
     */
    protected $limit;

    /**
     * Contains the count
     *
     * @var int
     */
    protected $count;
}