<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\QueryException;
use Throwable;

class MSSQLException extends QueryException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
