<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class HTTPValidationError extends Resource
{
    /**
     * Detail.
     * 
     * @var array<ValidationError>
     */
    public array $detail;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'array_types' => 
        array (
                'detail' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\ValidationError',
        ),
    );
}
