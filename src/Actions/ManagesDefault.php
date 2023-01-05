<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Actions;

use GuzzleHttp\Exception\GuzzleException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\APIStatus;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\Resource;

trait ManagesDefault
{
    /**
     * Root.
     *
     * @return \Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\APIStatus
     */
    public function default(): APIStatus
    {
        return new APIStatus($this->get('/'), $this);
    }

    /**
     * @template T of Resource
     * @phpstan-param string $verb
     * @phpstan-param string $uri
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function raw(string $verb, string $uri, Resource|array $payload = []): array
    {
        return $this->request($verb, $uri, $payload);
    }
}