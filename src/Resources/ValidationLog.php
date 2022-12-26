<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class ValidationLog extends Resource
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

    public InstitutionType $institution_type;

    public int $employee_count_estimate;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'institution_type' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\InstitutionType',
    );
}
