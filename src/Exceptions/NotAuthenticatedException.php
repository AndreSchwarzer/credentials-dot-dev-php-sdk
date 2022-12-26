<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;

use Exception;

class NotAuthenticatedException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('You have provided no credentials or invalid credentials.');
    }
}
