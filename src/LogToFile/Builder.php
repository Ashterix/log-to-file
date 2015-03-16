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


class Builder {

    const DATE_FORMAT = "Y-m-d H:s:i";

    private $build = '';
    private $msg = '';
    private $headline = '';

    public function __construct($msg, $headline = '')
    {
        $this->msg = $msg;
        $this->headline = $headline;
    }

    private function tabulator($nl)
    {
        $this->build .= ($nl) ? PHP_EOL : str_repeat(" ", 8);
    }

    public function addSeparator($item = '*')
    {
        $this->build .= str_repeat($item, 100) . PHP_EOL;
        return $this;
    }

    public function addDate($nl = false)
    {
        $this->build .= date(self::DATE_FORMAT);
        $this->tabulator($nl);
        return $this;
    }

    public function addHeadline($nl = false)
    {
        $this->build .= $this->headline;
        $this->tabulator($nl);
        return $this;
    }

    public function addMsg()
    {
        $this->build .= $this->msg;
        return $this;
    }

    public function getBuildMsg()
    {
        return $this->build;
    }

}