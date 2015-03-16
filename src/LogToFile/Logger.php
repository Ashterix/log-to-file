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
     * @var null|string filename for logfile
     */
    protected $fileName = null;

    /**
     * @var \UFOFilesystem\File
     */
    protected $logFile;

    /**
     * @param string $fileName
     */
    public function __construct($fileName = '')
    {
        if (empty($fileName)) {
            $fileName = date("Y-m-d") . self::DEFAULT_LOG_EXT;
        }
        $this->fileName = $fileName;
        $this->logFile = new File($this->fileName);
    }

    /**
     * @description Write to log file
     *
     * @param string $msg
     * @param string $headline
     */
    public function write($msg = '', $headline = '')
    {
        $buildMsg = new BuildWrapper($msg, $headline);
        $fMsg = $buildMsg->addSeparator()->addDate()->addHeadline(true)->addMsg()->getBuildMsg();

        $this->logFile->setContent($fMsg)->save();
    }


}
