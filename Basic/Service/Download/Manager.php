<?php
namespace Download;


use Download\Adapter\AdapterInterface;
use Log\Logger;
use Log\LoggerProxy;
use User;

class Manager implements AdapterInterface
{
    /** @var AdapterInterface */
    protected $adapter;
    /** @var LoggerProxy */
    protected $logger;

    /**
     * @return AdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }

    /**
     * @param AdapterInterface $adapter
     */
    public function setAdapter($adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param $file
     * @param User $user
     *
     * @return string
     */
    public function download($file, User $user)
    {
//        Logger::getInstance()->log("File was requested: $file");
        $this->getLogger()->log("File was requested: $file");
        return $this->getAdapter()->download($file, $user);
    }

    /**
     * @return LoggerProxy
     */
    public function getLogger()
    {
        if (null === $this->logger) {
            $this->logger = new LoggerProxy();
        }
        return $this->logger;
    }

    /**
     * @param LoggerProxy $logger
     */
    public function setLogger($logger)
    {
        $this->logger = $logger;
    }
}