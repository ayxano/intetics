<?php

namespace Exceptions;

class TokenMismatchException extends \Exception
{
	public function __construct()
	{
		$this->code = 419;
	}
	private function toArray() : array
	{
		return [
			'error' => 'HTTP 419 Page Expired!',
		];
	}

	public function __toString() : string
	{
		return json_encode($this->toArray());
	}
}