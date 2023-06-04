<?php

namespace Interfaces;

interface HasMessage
{
    public function setMessage(string $subject) : void;

    public function getMessage() : string;
}