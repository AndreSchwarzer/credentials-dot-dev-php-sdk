<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;

use Exception;

class NotAuthorizedException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('You seem to have not enough privileges to perform an action on the requested resource(s).');
    }
}
