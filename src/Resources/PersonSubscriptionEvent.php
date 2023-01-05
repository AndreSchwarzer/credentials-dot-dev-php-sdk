<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class PersonSubscriptionEvent extends Resource
{
    /**
     * Subscription Id.
     * 
     * format: uuid4
     */
    public string $subscription_id;

    /**
     * Person Id.
     * 
     * format: uuid4
     */
    public string $person_id;

    /**
     * Document Id.
     * 
     * format: uuid4
     */
    public string $document_id;

    public PersonEventType $event;

    /**
     * {@inheritdoc}
     */
    protected array $attributesLookup = array (
        'event' => '\\Web3IsGoingJustGreat\\CredentialsDev\\SDK\\Resources\\PersonEventType',
    );
}
