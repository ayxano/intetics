<?php

namespace Libraries;

use Interfaces\HasMessage;
use Interfaces\MessageInterface;

class SmsSender implements HasMessage, MessageInterface
{
    public function __construct(protected string | null $message = null, protected string | null $subject = null)
    {
        
    }
    
    public function setMessage(string $message) : void
    {
        $this->message = $message;
    }

    public function getMessage() : string
    {
        return $this->message;
    }


    public function send() : bool
    {
        return true;
    }
}