<?php

namespace Libraries;

use Interfaces\HasMessage;
use Interfaces\HasSubject;
use Interfaces\HasReceiver;
use Interfaces\MessageInterface;

class EmailSender implements HasReceiver, HasMessage, HasSubject, MessageInterface
{
    public function __construct(protected string | null $receiver = null, protected string | null $message = null, protected string | null $subject = null)
    {
        
    }
    
    public function setReceiver(string $receiver) : void
    {
        $this->receiver = $receiver;
    }

    public function getReceiver() : string
    {
        return $this->receiver;
    }

    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getMessage() : string
    {
        return $this->message;
    }

    public function setSubject(string $subject) : void
    {
        $this->subject = $subject;
    }

    public function getSubject() : string
    {
        return $this->subject;
    }

    public function send() : bool
    {
        return true;
    }
}