<?php
namespace Exceptions;
class CustomThrowableException extends \Exception
{
    private function toArray()
    {
        return [
            'error' => $this->getMessage(),
        ];
    }

    public function __toString() : string
    {
        return json_encode($this->toArray());
    }
}