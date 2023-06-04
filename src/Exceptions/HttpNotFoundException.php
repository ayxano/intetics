<?php
namespace Exceptions;
class HttpNotFoundException extends \Exception
{
    public function __construct()
    {
        $this->code = 404;
    }
    private function toArray() : array
    {
        return [
            'error' => 'HTTP 404 Not Found!',
        ];
    }

    public function __toString() : string
    {
        return json_encode($this->toArray());
    }
}