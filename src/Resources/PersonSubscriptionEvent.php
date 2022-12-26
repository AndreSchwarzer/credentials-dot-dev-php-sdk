<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class PersonSubscriptionEvent extends Resource
{
    public string $subscription_id;

    public string $person_id;

    public string $document_id;

    public PersonEventType $event;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = array (
        'event' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\PersonEventType',
    );
}
