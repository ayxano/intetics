<?php

namespace Interfaces;

interface HasSubject
{
    public function setSubject(string $subject) : void;

    public function getSubject() : string;
}