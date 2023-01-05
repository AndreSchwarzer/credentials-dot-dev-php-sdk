<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class ValidationLog extends Resource
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

    public InstitutionType $institution_type;

    /**
     * Employee Count Estimate.
     */
    public int $employee_count_estimate;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'institution_type' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\InstitutionType',
    );
}
