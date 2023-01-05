<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;

use Exception;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Exceptions/NotFoundException.php
 */
class NotFoundException extends Exception
{
    /**
     * Create a new exception instance.
     *
     * @return void
     */
    public function __construct(?string $message = null)
    {
        parent::__construct($message ?? 'The resource you are looking for could not be found.');
    }
}
