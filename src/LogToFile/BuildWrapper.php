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
     * @param mixed $separator
     *
     * @return $this
     */
    public function addDate($separator)
    {
        $this->wrappedMsg .= date(self::DATE_FORMAT);
        $this->wrappedMsg .= $separator;
        return $this;
    }

    /**
     * @description Add message to wrapper
     *
     * @param $msg
     * @param mixed $separator
     *
     * @return $this
     */
    public function addMsg($msg, $separator = PHP_EOL)
    {
        $this->wrappedMsg .= $msg;
        $this->wrappedMsg .= $separator;
        return $this;
    }

    /**
     * @description Return wrapped message
     *
     * @return string
     */
    public function getBuildMsg()
    {
        $return = $this->wrappedMsg;
        $this->wrappedMsg = '';
        return $return;
    }



}