<?php
namespace Exceptions;
class HttpUnprocessableEntityException extends \Exception
{
    public function __construct()
    {
        $this->code = 422;
    }
    private function toArray() : array
    {
        return [
            'error' => 'HTTP 422 Unprocessable Entity!',
        ];
    }

    public function __toString() : string
    {
        return json_encode($this->toArray());
    }
}