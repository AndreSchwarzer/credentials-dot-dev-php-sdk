<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;
use Exception;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\ValidationLog;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Exceptions/ValidationException.php
 */
class ValidationException extends Exception
{
    /**
     * @phpstan-param array<ValidationLog>|array{mixed} $errors
     */
    public function __construct(public array $errors = [])
    {
        parent::__construct('The given data failed to pass validation.');
    }


    /**
     * @phpstan-return array<ValidationLog>|array{mixed}
     */
    public function errors(): array
    {
        return $this->errors;
    }
}
