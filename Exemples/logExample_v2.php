<?
use LogToFile\Logger;

require_once('/vendor/autoload.php');

$log = new Logger('MyLog.log');

function myFormat($log, $msg = "", $headline = "") {
    /**
     * @var $log Logger;
     */
    return $log->decorate()
        ->addNewline()
        ->addDate()->addSeparator(" ")->addTime()->addSeparator(" ", 4)
        ->addMsg($headline)->addSeparator(" ")
        ->addMsg($msg)
        ->getBuildMsg();
}

$log->write(myFormat($log, "First message", "Start programme"));

// do something
// ...

$log->write(myFormat($log, "Second message", "Log point"));

// do something
// ...

$log->write(myFormat($log, "Programme finish"));

