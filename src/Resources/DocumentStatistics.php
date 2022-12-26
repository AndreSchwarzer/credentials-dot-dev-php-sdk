<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class DocumentStatistics extends Resource
{
    public Document $document;

    /**
     * @var ValidationLog[]
     */
    public array $past_validations;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'document' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Document',
    );
}
