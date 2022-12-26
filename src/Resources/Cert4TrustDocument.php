<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class Cert4TrustDocument extends Resource
{
    /**
     * The API expects and returns timestamps in the ISO 8601 format.
     * This SDK transforms 'string' representations to \Carbon\CarbonImmutable (vice versa) for you.
     * 
     * @example YYYY-MM-DDTHH:MM:SS.sssssssZ
     * @example $carbon->toIso8601ZuluString('microsecond')
     */
    public \Carbon\CarbonImmutable $created_at;

    public string $id;

    public string $hash;

    public Cert4TrustInstitute $issuer;

    /**
     * @var Cert4TrustDocumentTransaction[]
     */
    public array $transactions;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'issuer' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\Cert4TrustInstitute',
    );
}
