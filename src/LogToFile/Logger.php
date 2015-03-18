<?php
/**
 * log-to-file
 *
 * @file: Logger.php
 * @author Ashterix <ashterix69@gmail.com>
 *
 * Class - Logger
 * @description
 *
 * Created by JetBrains PhpStorm.
 * Date: 15.03.2015
 * Time: 21:24
 */

namespace LogToFile;


use UFOFilesystem\File;

class Logger {

    const DEFAULT_LOG_EXT = '.log';

    /**
     * @var \UFOFilesystem\File
     */
    protected $logFile;

    /**
     * @var Decorator
     */
    protected $decorator;

    /**
     * @param string $fileName
     */
    public function __construct($fileName = '')
    {
        if (empty($fileName)) {
            $fileName = date("Y-m-d") . self::DEFAULT_LOG_EXT;
        }
        $this->logFile = new File($fileName);
        $this->decorator = new Decorator();
    }

    /**
     * @description Write to log file
     *
     * @param string $msg
     */
    public function write($msg = '')
    {
        $this->logFile
            ->setContent($msg)
            ->save();
    }

    /**
     * @description Write to log file with standard formatting
     *
     * @param string $msg
     * @param string $headline
     */
    public function writeStandard($msg = '', $headline = '')
    {
        $fMsg = $this->decorator
            ->addSeparator("*", 100)
            ->addNewline()
            ->addDate()
            ->addSeparator(" ")
            ->addTime()
            ->addSeparator(" ", 8)
            ->addMsg($headline)
            ->addNewline()
            ->addMsg($msg)
            ->getBuildMsg();

        $this->write($fMsg);
    }

    /**
     * @description Write to log file
     */
    public function decorate()
    {
        return $this->decorator;
    }

}
