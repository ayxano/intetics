<?php
namespace Exceptions;
class EntityNotFoundException extends \Exception
{
    public function __construct()
    {
        $this->code = 404;
    }
    private function toArray() : array
    {
        return [
            'error' => 'Entity Not Found!',
        ];
    }

    public function __toString() : string
    {
        return json_encode($this->toArray());
    }
}