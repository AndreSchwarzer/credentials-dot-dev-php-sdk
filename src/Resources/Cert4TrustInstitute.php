<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class Cert4TrustInstitute extends Resource
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
     * Name.
     */
    public string $name;

    /**
     * Website.
     */
    public string $website;

    /**
     * Blockchain Address.
     */
    public string $blockchain_address;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
    );
}
