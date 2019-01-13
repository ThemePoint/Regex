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


class RegexPattern
{
    /**
     * Get expression for html search
     *
     * @param string $htmlTag
     * @return string
     */
    public static function getHtmlSearchExpression(string $htmlTag) : string
    {
        return '/\<' . $htmlTag . '.*>(.|\n)*?<\/' . $htmlTag . '>/';
    }
}