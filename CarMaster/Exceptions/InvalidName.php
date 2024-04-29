<?php

namespace CarMaster\Exceptions;

use Exception;

class InvalidName extends Exception
{
    public function __construct($message = "Invalid name", $code = 52)
    {
        parent::__construct($message, $code);
    }
}
