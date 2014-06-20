<?php
namespace Mail;


abstract class AbstractMail
{
    protected $to;
    protected $from;

    public function send($message)
    {
        $this->configureSender();
        $this->configureReceiver();

        $this->deliver(
            $this->formatMessage($message)
        );

    }

    abstract public function configureSender();
    abstract public function configureReceiver();
    abstract public function formatMessage($message);
    abstract public function deliver($message);
}