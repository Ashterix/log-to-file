<?php
/**
 * log-to-file 
 * @version: 1.0.0
 *
 * @file: Builder.php
 * @author Ashterix <ashterix69@gmail.com>
 *  
 * Class - Builder
 * @description 
 *
 * Created by JetBrains PhpStorm.
 * Date: 16.03.2015
 * Time: 2:00
 */

namespace LogToFile;


class BuildWrapper {

    const DATE_FORMAT = "Y-m-d H:s:i";

    /**
     * @var string Message for wrapping
     */
    private $msg = '';

    /**
     * @var string Message after wrapping
     */
    private $wrappedMsg = '';

    /**
     * @var string Title for message
     */
    private $headline = '';

    /**
     * @param string $msg
     * @param string $headline
     */
    public function __construct($msg, $headline = '')
    {
        $this->msg = $msg;
        $this->headline = $headline;
    }

    /**
     * @description add newline or indentation
     *
     * @param bool $nl
     */
    private function tabulator($nl = false)
    {
        $this->wrappedMsg .= ($nl) ? PHP_EOL : str_repeat(" ", 8);
    }

    /**
     * @description Add separator to wrapper
     *
     * @param string $item
     *
     * @return $this
     */
    public function addSeparator($item = '*')
    {
        $this->wrappedMsg .= str_repeat($item, 100) . PHP_EOL;
        return $this;
    }

    /**
     * @description Add date to wrapper
     *
     * @param bool $nl
     *
     * @return $this
     */
    public function addDate($nl = false)
    {
        $this->wrappedMsg .= date(self::DATE_FORMAT);
        $this->tabulator($nl);
        return $this;
    }

    /**
     * @description Add headline to wrapper
     *
     * @param bool $nl
     *
     * @return $this
     */
    public function addHeadline($nl = false)
    {
        $this->wrappedMsg .= $this->headline;
        $this->tabulator($nl);
        return $this;
    }

    /**
     * @description Add message to wrapper
     *
     * @return $this
     */
    public function addMsg()
    {
        $this->wrappedMsg .= $this->msg;
        return $this;
    }

    /**
     * @description Return wrapped message
     *
     * @return string
     */
    public function getBuildMsg()
    {
        return $this->wrappedMsg;
    }

}