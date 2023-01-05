<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class Person extends Resource
{
    /**
     * Created At.
     * 
     * The API expects and returns timestamps in the ISO 8601 format.
     * This SDK transforms 'string' representations to \Carbon\CarbonImmutable (vice versa) for you.
     * 
     * @example YYYY-MM-DDTHH:MM:SS.sssssssZ
     * @example $carbon->toIso8601ZuluString('microsecond')
     */
    public \Carbon\CarbonImmutable $created_at;

    /**
     * Id.
     * 
     * format: uuid4
     */
    public string $id;

    /**
     * Tenant Id.
     * 
     * format: uuid4
     */
    public string $tenant_id;

    /**
     * External Identifier.
     */
    public string $external_identifier;

    /**
     * Documents.
     * 
     * @var array<Document>
     */
    public array $documents;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'array_types' => 
        array (
                'documents' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Document',
        ),
    );
}
