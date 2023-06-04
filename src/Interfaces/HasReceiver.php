<?php

namespace Interfaces;

interface HasReceiver
{
    public function setReceiver(string $receiver) : void;

    public function getReceiver() : string;
}