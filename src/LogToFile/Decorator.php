<?php
/**
 * log-to-file
 *
 * @file: Decorator.php
 * @author Ashterix <ashterix69@gmail.com>
 *
 * Class - Decorator
 * @description
 *
 * Created by JetBrains PhpStorm.
 * Date: 18.03.2015
 * Time: 13:57
 */

namespace LogToFile;


class Decorator {

    const FORMAT_DATE = "Y-m-d";
    const FORMAT_TIME = "H:s:i";

    /**
     * @var string Message after wrapping
     */
    private $wrappedMsg = '';

    /**
     * @description Add separator to wrapper
     *
     * @param string $separator
     * @param int $countRepetitions
     *
     * @return $this
     */
    public function addSeparator($separator = '*', $countRepetitions = 1)
    {
        $this->wrappedMsg .= str_repeat($separator, $countRepetitions);
        return $this;
    }

    /**
     * @description Add newline
     *
     * @return $this
     */
    public function addNewline()
    {
        $this->wrappedMsg .= PHP_EOL;
        return $this;
    }

    /**
     * @description Add date to wrapper
     *
     * @return $this
     */
    public function addDate()
    {
        $this->wrappedMsg .= date(self::FORMAT_DATE);
        return $this;
    }

    /**
     * @description Add time to wrapper
     *
     * @return $this
     */
    public function addTime()
    {
        $this->wrappedMsg .= date(self::FORMAT_TIME);
        return $this;
    }

    /**
     * @description Add message to wrapper
     *
     * @param $msg
     *
     * @return $this
     */
    public function addMsg($msg)
    {
        $this->wrappedMsg .= $msg;
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