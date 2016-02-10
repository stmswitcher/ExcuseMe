# ExcuseMe
Error message generator based on programmers' excuses.

#Installation via composer:
```
php composer.phar require "stmswitcher/excuseme:@dev"
```

#Usage
```php
use stmswitcher\excuseme\ExcuseMe;

$excuseme = new ExcuseMe();

echo $excuseme->forCode($exception->getCode());
```

or

```php
use stmswitcher\excuseme\ExcuseMe;

echo ExcuseMe::getMessage($locale, $code);
```

#Localization
To use localized messages, you only have to specify your language like this:
```php
$excuseme = new ExcuseMe('ru');
```

or

```php
echo ExcuseMe::getMessage('ru', $code);
```

Only Russian and English localizations is provided right now.
Feel free to contribute excuses for your language! :)
