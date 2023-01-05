<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

/**
 * @extends Resource<self>
 */
class APIStatus extends Resource
{
    /**
     * Environment.
     */
    public string $environment;

    /**
     * Version.
     */
    public string $version;

    /**
     * Active Validators.
     * 
     * @var array<string>
     */
    public array $active_validators;

    /**
     * Active Integrations.
     * 
     * @var array<string>
     */
    public array $active_integrations;

    /**
     * Documentation Url.
     */
    public string $documentation_url;

}
