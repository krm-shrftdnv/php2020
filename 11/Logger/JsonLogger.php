<?php

namespace Logger;

use Psr\Log\LoggerInterface;

class JsonLogger implements LoggerInterface
{

    private string $filename;

    /**
     * JsonLogger constructor.
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->filename = $filename;
    }

    /**
     * @inheritDoc
     */
    public function emergency($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);

        $record = array(
            "type" => "emergency",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function alert($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "alert",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function critical($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "critical",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function error($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "error",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function warning($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "warning",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function notice($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "notice",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function info($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "info",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function debug($message, array $context = array())
    {
        $current = file_get_contents($this->filename);
        $json_array = json_decode($current, true);
        $record = array(
            "type" => "debug",
            "time" => date("H:i:s"),
            "content" => $message
        );
        $json_array[] = $record;
        file_put_contents($this->filename, json_encode($json_array));
    }

    /**
     * @inheritDoc
     */
    public function log($level, $message, array $context = array())
    {
        switch ($level) {
            case "emergency":
            {
                $this->emergency($message, $context);
                break;
            }
            case "alert":
            {
                $this->alert($message, $context);
                break;
            }
            case "critical":
            {
                $this->critical($message, $context);
                break;
            }
            case "error":
            {
                $this->error($message, $context);
                break;
            }
            case "warning":
            {
                $this->warning($message, $context);
                break;
            }
            case "notice":
            {
                $this->notice($message, $context);
                break;
            }
            case "info":
            {
                $this->info($message, $context);
                break;
            }
            case "debug":
            {
                $this->debug($message, $context);
                break;
            }
        }
    }
}
