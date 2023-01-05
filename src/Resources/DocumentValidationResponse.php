<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class DocumentValidationResponse extends Resource
{
    public Document $document;

    /**
     * Validations.
     * 
     * @var array<Cert4TrustDocument>
     */
    public array $validations;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'document' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Document',
        'array_types' => 
        array (
                'validations' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Cert4TrustDocument',
        ),
    );
}
