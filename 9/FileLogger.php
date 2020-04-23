<?php

class FileLogger extends AbstrLogger
{
    private $file;
    function __construct(string $file_path){
        $this->file = fopen($file_path, 'a');
    }
    public function log(string $s)
    {
        fwrite($this->file,$s.PHP_EOL);
    }

    public function __destruct()
    {
        fclose($this->file);
    }
}