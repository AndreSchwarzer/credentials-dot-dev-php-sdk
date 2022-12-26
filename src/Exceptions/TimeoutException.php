<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;
use Exception;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Exceptions/TimeoutException.php
 */
class TimeoutException extends Exception
{
    /**
     * The output returned from the operation.
     */
    public array $output;

    public function __construct(array $output = [])
    {
        parent::__construct('Script timed out while waiting for the process to complete.');

        $this->output = $output;
    }

    /**
     * The output returned from the operation.
     */
    public function output(): array
    {
        return $this->output;
    }
}
