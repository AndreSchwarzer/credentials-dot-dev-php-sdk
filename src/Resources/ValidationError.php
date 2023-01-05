<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class ValidationError extends Resource
{
    /**
     * Location.
     * 
     * @var array<string|int>
     */
    public array $loc;

    /**
     * Message.
     */
    public string $msg;

    /**
     * Error Type.
     */
    public string $type;

}
