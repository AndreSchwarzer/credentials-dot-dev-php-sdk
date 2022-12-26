<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class DocumentValidation extends Resource
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

    /**
     * The API expects and returns timestamps in the ISO 8601 format.
     * This SDK transforms 'string' representations to \Carbon\CarbonImmutable (vice versa) for you.
     * 
     * @example YYYY-MM-DDTHH:MM:SS.sssssssZ
     * @example $carbon->toIso8601ZuluString('microsecond')
     */
    public \Carbon\CarbonImmutable $validated_at;

    public string $validation_id;

    public string $validation_type;

    public string $validation_status;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'validated_at' => '\\Carbon\\CarbonImmutable',
    );
}
