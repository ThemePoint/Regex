<?php
/**
 * Regex
 * Copyright (c) 2019 Shopbase
 *
 * @author Hendrik Legge <hendrik.legge@themepoint.de>
 * @version 1.0.0.0
 * @package de.themepoint.php.components.regex
 *
 * This file includes all tests for the Regex package
 *
 */

error_reporting(E_ALL);

require_once './vendor/autoload.php';

$result_match = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz');
$result_match_all = \Shopbase\Regex\Regex::matchAll('/(?J)(?<match>foo)|(?<match>bar)/', 'foo bar');
$result_replace = \Shopbase\Regex\Regex::replace('/(\d+)\. (\w+) (\d+)/i', '15. April 2003', '${2}1,$3');
$result_split = \Shopbase\Regex\Regex::split('/[\s,]+/', 'hypertext language, programming');
$result_grep = \Shopbase\Regex\Regex::grep('/^(\d+)?\.\d+$/', array(0,1,0.5,1.5));
$result_filter = \Shopbase\Regex\Regex::filter(array('/\d/', '/[a-z]/', '/[1a]/'), array('A:$0', 'B:$0', 'C:$0'), array('1', 'a', '2', 'b', '3', 'A', 'B', '4'));

var_dump($result_match, $result_match_all, $result_replace, $result_split, $result_grep, $result_filter);

