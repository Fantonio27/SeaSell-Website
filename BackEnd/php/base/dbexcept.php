<?php

/**
 * `DBException`
 */
class DBException extends Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message = "Unknown DB Error!";
        $this->code = 0;
    }
}

class DBExcept_DB_CannotConnect extends DBException
{
    public function __construct($message, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        
    }
}

class DBExcept_LogIn_AccountNotExists extends DBException
{
    public function __construct($message, string $account, $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);

        $this->message .= ": The account " . $account . " is not found in the database!";
        $this->code = 0;
    }
}

class DBExcept_LogIn_CredentialsCollision extends DBException
{
}

class DBExcept_LogIn_MultipleAccountMatch extends DBException
{
}

class DBExcept_Auth_InvalidAccessKey extends DBException
{
}

class DBExcept_Listing_InboundItemAlreadyExists extends DBException
{
}
