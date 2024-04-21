<?php

namespace CarMaster\Exceptions;

use Exception;

class InvalidYearCar  extends Exception
{
    public function __construct($message = "Invalid Year Car")
    {
        parent::__construct($message);
    }
}