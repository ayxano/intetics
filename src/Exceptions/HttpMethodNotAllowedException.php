<?php
namespace Exceptions;

class HttpMethodNotAllowedException extends \Exception
{
    public function __construct()
    {
        $this->code = 405;
    }
    private function toArray() : array
    {
        return [
            'error' => 'HTTP 405 Method Not Allowed!',
        ];
    }

    public function __toString() : string
    {
        return json_encode($this->toArray());
    }
}