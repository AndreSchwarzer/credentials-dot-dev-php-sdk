<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions;
use Exception;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Exceptions/ValidationException.php
 */
class ValidationException extends Exception
{
    public array $errors;

    public function __construct(array $errors = [])
    {
        //todo \Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\ValidationLog
        parent::__construct('The given data failed to pass validation.');

        $this->errors = $errors;
    }

    public function errors(): array
    {
        return $this->errors;
    }
}
