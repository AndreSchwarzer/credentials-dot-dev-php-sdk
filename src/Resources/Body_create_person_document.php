<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class Body_create_person_document extends Resource
{
    /**
     * Document.
     * 
     * format: binary
     */
    public string $document;

}
