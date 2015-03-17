<?php
/**
 * log-to-file 
 * @version: 1.0.0
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
     * @var BuildWrapper
     */
    protected $wrapperBuilder;

    /**
     * @var string
     */
    protected $separator;

    /**
     * @param string $fileName
     * @param string $separator Separator for logic blocks
     */
    public function __construct($fileName = '', $separator = '')
    {
        $this->separator = $separator;
        if (empty($fileName)) {
            $fileName = date("Y-m-d") . self::DEFAULT_LOG_EXT;
        }
        $this->logFile = new File($fileName);
        $this->wrapperBuilder = new BuildWrapper();
    }

    /**
     * @description Write to log file
     *
     * @param string $msg
     * @param string $headline
     */
    public function write($msg = '', $headline = '')
    {
        $fMsg = $this->wrapperBuilder
            ->addSeparator()
            ->addDate($this->separator)
            ->addMsg($headline, $this->separator)
            ->addMsg($msg, $this->separator)
            ->getBuildMsg();

        $this->logFile->setContent($fMsg)->save();
    }


}
