<?php

namespace Logger;

class LoggerInitiator
{

    private JsonLogger $logger;

    /**
     * LoggerInitiator constructor.
     * @param string $filename
     */
    public function __construct(string $filename)
    {
        $this->logger = new JsonLogger($filename);
    }

    public function doLog(string $level, string $message)
    {
        $this->logger->log($level, $message);
    }

}
