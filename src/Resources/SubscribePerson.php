<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

class SubscribePerson extends Resource
{
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

}
