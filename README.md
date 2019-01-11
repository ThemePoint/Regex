# Regex
This is a package which allows PHP Regex usage without much setup. You can use the static functions as like as the default preg_* functions and they will give you a match object with a lot of functions to evaluate the matches.

Copyright (c) 2019 Shopbase

# Usage

```php
// preg_match
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz');

// preg_match_all
$result = \Shopbase\Regex\Regex::matchAll('/(?J)(?<match>foo)|(?<match>bar)/', 'foo bar');

// preg_replace
$result = \Shopbase\Regex\Regex::replace('/(\d+)\. (\w+) (\d+)/i', '15. April 2003', '${2}1,$3');

// preg_split
$result = \Shopbase\Regex\Regex::split('/[\s,]+/', 'hypertext language, programming');

// preg_grep
$result = \Shopbase\Regex\Regex::grep('/^(\d+)?\.\d+$/', array(0,1,0.5,1.5));

// preg_filter
$result = \Shopbase\Regex\Regex::filter(array('/\d/', '/[a-z]/', '/[1a]/'), array('A:$0', 'B:$0', 'C:$0'), array('1', 'a', '2', 'b', '3', 'A', 'B', '4'));
```

```php
// get if request has matches
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getHasMatches();

// get matches Object
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches();

// get matches as array
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->matches();

// get matches group by int
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->group(0);

// get matches group by string
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->namedGroup('group');

// get mapped matches matches
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->map(function ($item){...});

// get matches as merged string
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->merge();

// get matches count
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->count();
```
