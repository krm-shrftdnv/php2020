<?php

class BrowserLogger extends AbstrLogger
{
    private string $type;
    private string $time;

    function __construct(string $type)
    {
        $this->type = $type;
    }

    public function log(string $s)
    {
        switch ($this->type) {
            case "Time": {
                date_default_timezone_set('Europe/Moscow');
                $this->time = date("G:i:s");
                echo $this->time." ".$s."<br>";
                break;
            }
            case "Date and time": {
                date_default_timezone_set('Europe/Moscow');
                $this->time = date("j-M-Y G:i:s");
                echo $this->time." ".$s."<br>";
                break;
            }
            case "Nothing": {
                echo $s."<br>";
                break;
            }
        }
    }


}
