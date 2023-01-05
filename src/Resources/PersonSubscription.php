<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class PersonSubscription extends Resource
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
     * Callback Url.
     * 
     * minLength: 1
     * maxLength: 2083
     * format: uri
     */
    public string $callback_url;

    /**
     * @var array<PersonEventType>
     */
    public array $events;

    /**
     * Person Id.
     * 
     * format: uuid4
     */
    public string $person_id;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'created_at' => '\\Carbon\\CarbonImmutable',
        'array_types' => 
        array (
                'events' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\PersonEventType',
        ),
    );
}
