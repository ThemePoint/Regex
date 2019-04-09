# Regex
This is a package which allows PHP Regex usage without much setup. You can use the static functions as like as the default preg_* functions and they will give you a match object with a lot of functions to evaluate the matches.

Copyright (c) 2019 Shopbase

# Usage

There are several functions which you can use.
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

// preg_quote. This function will validate you expression and return it as string.
\Shopbase\Regex\Regex::validateExpression('...');
\Shopbase\Regex\Regex::quote('...');
```

All of these functions will return an object of type '\Shopbase\Regex\Result\Result'. This object contains the matches and several informations about them.
```php
// get the boolean status if the result contains matches or not.
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getHasMatches();

// get the count of contained matches
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getCount();

// get the '\Shopbase\Regex\Result\Matches' object. This object contains all found matches.
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches();
```

If you use the 'getMatches' function of Result object you will get an object which contains all matches and a list of functions to handle them.
```php
// get array with all matches
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->matches();

// get a group by int. Here it is possible to include subgroups (Every array item will represent an group into an group)
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->group(0);
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->group(0, [0, 0]);

// you can do the same group function with string values. It will work equal as the 'group' function
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->namedGroup('group');
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->namedGroup('group', ['subgroup', 'subgroup']);

// to get multiple groups you can use the 'groups' function. Here it is possible to include the subgroups of every item, too. 
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->groups(0, 1, 2);
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->groups([0, 0], [1, 0], 2);

$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->namedGroups('group_1', 'group_2', 'group_3');
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->namedGroups(['group_1', 'subgroup_1'], ['group_2', 'subgroup_1', 'subgroup_2'], 'group_3');

// map matches by callback function
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->map(function ($item){...});

// merge matches to string
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->merge();

// get count of matches
$result = \Shopbase\Regex\Regex::match('/(foo)(bar)(baz)/', 'foobarbaz')->getMatches()->count();
```

The regex function will accept several flags. This flags will contained into the following object.
```php
\Shopbase\Regex\RegexFlags::$PREG_OFFSET_CAPTURE;
\Shopbase\Regex\RegexFlags::$PREG_UNMATCHED_AS_NULL;
\Shopbase\Regex\RegexFlags::$PREG_PATTERN_ORDER;
\Shopbase\Regex\RegexFlags::$PREG_SET_ORDER;
\Shopbase\Regex\RegexFlags::$PREG_GREP_INVERT;
\Shopbase\Regex\RegexFlags::$PREG_SPLIT_NO_EMPTY;
\Shopbase\Regex\RegexFlags::$PREG_SPLIT_DELIM_CAPTURE;
\Shopbase\Regex\RegexFlags::$PREG_SPLIT_OFFSET_CAPTURE;
```

# Patterns

The package contains a object which includes some predefined patterns
```php
\Shopbase\Regex\RegexPattern::getHtmlSearchExpression('div');
```

[![Donate](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WPDZYBK6E4ZAG&source=url)
