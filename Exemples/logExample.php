<?
use LogToFile\Logger;

require_once('/vendor/autoload.php');

$log = new Logger('MyLog.log', " | ");

$log->write("First message", "Start programme");

// do something
// ...

$log->write("Second message", "Log point");

// do something
// ...

$log->write("Programme finish");
