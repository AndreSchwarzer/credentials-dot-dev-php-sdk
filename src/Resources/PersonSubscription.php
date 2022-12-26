<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class PersonSubscription extends Resource
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

    public string $tenant_id;

    /**
     * minLength: 1
     * 
     * maxLength: 2083
     */
    public string $callback_url;

    /**
     * @var PersonEventType[]
     */
    public array $events;

    public string $person_id;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
    );
}
