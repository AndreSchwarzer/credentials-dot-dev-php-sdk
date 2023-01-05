<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class DocumentStatistics extends Resource
{
    public Document $document;

    /**
     * Past Validations.
     * 
     * @var array<ValidationLog>
     */
    public array $past_validations;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'document' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Document',
        'array_types' => 
        array (
                'past_validations' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\ValidationLog',
        ),
    );
}
