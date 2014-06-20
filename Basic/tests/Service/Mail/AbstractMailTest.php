<?php
namespace Test\Service\Mail;


use PHPUnit_Framework_TestCase;

class AbstractMailTest  extends PHPUnit_Framework_TestCase
{
    public function test_send()
    {
        $message = 'dummy message';
        $mail = $this->getMockForAbstractClass('Mail\AbstractMail');

        $mail
            ->expects($this->once())
            ->method('configureSender');

        $mail
            ->expects($this->once())
            ->method('configureReceiver');

        $mail
            ->expects($this->once())
            ->method('formatMessage')
            ->with($message)
            ->will($this->returnValue($message));

        $mail
            ->expects($this->once())
            ->method('deliver')
            ->with($message);

        $mail->send($message);
    }
}