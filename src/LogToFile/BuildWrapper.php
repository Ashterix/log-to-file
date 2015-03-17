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
     * @var string Message after wrapping
     */
    private $wrappedMsg = '';

    /**
     * @var string Separator for logic blocks
     */
    private $separator = '';

    /**
     * @description add newline or indentation
     *
     * @param bool $nl
     */
    private function tabulator($nl = false)
    {
        $this->wrappedMsg .= ($nl) ? PHP_EOL : str_repeat(" ", 8);
        $this->wrappedMsg .= $this->separator;
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
        $this->wrappedMsg .= str_repeat($item, 50) . PHP_EOL;
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
     * @description Add message to wrapper
     *
     * @param $msg
     * @param bool $nl
     *
     * @return $this
     */
    public function addMsg($msg, $nl = false)
    {
        $this->wrappedMsg .= $msg;
        $this->tabulator($nl);
        return $this;
    }

    /**
     * @description Set separator for logic blocks
     *
     * @param string $separator
     */
    public function setSeparator($separator)
    {
        $this->separator = $separator;
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