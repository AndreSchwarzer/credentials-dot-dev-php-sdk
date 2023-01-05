<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class Cert4TrustDocument extends Resource
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
     * Hash.
     */
    public string $hash;

    public Cert4TrustInstitute $issuer;

    /**
     * Transactions.
     * 
     * @var array<Cert4TrustDocumentTransaction>
     */
    public array $transactions;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'issuer' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Cert4TrustInstitute',
        'array_types' => 
        array (
                'transactions' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Cert4TrustDocumentTransaction',
        ),
    );
}
