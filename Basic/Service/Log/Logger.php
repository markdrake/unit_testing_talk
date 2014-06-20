<?php
namespace Log;


class Logger
{
    protected static $instance;

    private function __construct() {}

    public function __clone()
    {
        throw new \Exception('You nasty cheater! >:(');
    }

    public static function getInstance()
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function log($message)
    {
        // Write message to the log system //
    }

} 