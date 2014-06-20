<?php
namespace Log;


class LoggerProxy
{
    public function log($message)
    {
        Logger::getInstance()->log($message);
    }
} 