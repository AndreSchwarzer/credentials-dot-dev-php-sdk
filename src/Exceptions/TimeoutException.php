<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;
use Exception;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Exceptions/TimeoutException.php
 */
class TimeoutException extends Exception
{
    /**
     * @phpstan-param array{null|int|string|bool|float}|array{} $output
     */
    public function __construct(public array $output = [])
    {
        parent::__construct('Script timed out while waiting for the process to complete.');
    }

    /**
     * The output returned from the operation.
     *
     * @phpstan-return array{null|int|string|bool|float}|array{}
     */
    public function output(): array
    {
        return $this->output;
    }
}
