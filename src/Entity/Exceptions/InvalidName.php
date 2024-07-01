<?php

namespace App\Entity\Exceptions;

use Exception;

class InvalidName extends Exception
{
    public function __construct($message = "Invalid name", $code = 400)
    {
        parent::__construct($message, $code);
    }
}
