<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class DocumentValidationResponse extends Resource
{
    public Document $document;

    /**
     * @var Cert4TrustDocument[]
     */
    public array $validations;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'document' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Document',
    );
}
