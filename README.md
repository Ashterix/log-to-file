Log to file
===========
Easy logging to file.


Requirement
-----------

- PHP >= 5.4
- "ufo-cms/file-system": "dev-master"

Installation
------------

Via [Composer][]:

    require "ashterix/log-to-file": "dev-master"


Usage
-----

```php
use LogToFile\Logger;

$log = new Logger('MyLog.log');

$log->write("First message", "Start programme");

// do something
// ...

$log->write("Second message", "Log point");

// do something
// ...

$log->write("Programme finish");

```

If you don`t write filename, lib create log file with current date name
```php
// Current date: 2015-03-16
$currentDateLog = new Logger();
$log->write("Something");

// This construct create file "2015-03-16.log"

```


License
-------

This library is available under the [MIT license](LICENSE).


[Composer]: http://getcomposer.org/







