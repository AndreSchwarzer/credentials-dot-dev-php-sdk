<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class SubscribePerson extends Resource
{
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
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'array_types' => 
        array (
                'events' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\PersonEventType',
        ),
    );
}
