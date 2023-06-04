<?php

namespace Libraries;

class Notification
{
    private $emailSender;
    private $smsSender;
    
    public function __construct()
    {
        $this->emailSender = new EmailSender();
        $this->smsSender = new SmsSender();
    }

    public function sendData($subject, $message) : bool
    {
        $this->emailSender->setSubject($subject);
        $this->emailSender->setMessage($message);
        $this->emailSender->send($subject, $message);

        $this->emailSender->setMessage($message);
        $this->smsSender->send($subject, $message);
        return true;
    }
}