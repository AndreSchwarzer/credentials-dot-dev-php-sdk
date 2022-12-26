<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK;

use ValueError;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Actions\ManagesDefault;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Actions\ManagesPeople;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Forge.php
 */
class Credentials
{
    use MakesHttpRequests;
    // region Actions
    use ManagesDefault;
    use ManagesPeople;
    // endregion

    /**
     * The Credentials.dev API Key.
     */
    protected string $accessToken;

    /**
     * The Guzzle HTTP Client instance.
     */
    public \GuzzleHttp\Client $guzzleClient;

    /**
     * Number of seconds a request is retried.
     */
    public int $timeout = 30;

    /**
     * Create a new Credentials instance.
     */
    public function __construct(?string $accessToken = null, bool $useSandbox = false, ?Client $guzzleClient = null)
    {
        if (! is_null($accessToken)) {
            $this->setAccessToken($accessToken, $useSandbox, $guzzleClient);
        }

        if (! is_null($guzzleClient)) {
            $this->guzzleClient = $guzzleClient;
        }
    }

    /**
     * Transform the items of the collection to the given class.
     */
    protected function transformCollection(array $collection, string $class, array $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this);
        }, $collection);
    }

    /**
     * Set the api key and set up the guzzle request object.
     */
    public function setAccessToken(string $accessToken, bool $useSandbox = false, ?Client $guzzleClient = null): static
    {
        if (!$useSandbox) {
            throw new ValueError('You can use sandbox mode only, yet.');
        }

        $this->accessToken = $accessToken;

        $this->guzzleClient = $guzzleClient ?: new Client([
            'base_uri' => $useSandbox ? 'https://sandbox.api.credentials.dev/v1/' : 'https://api.credentials.dev/v1/',
            'http_errors' => false,
            'headers' => [
                'X-API-Key' => $this->accessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);

        return $this;
    }

    public function setTimeout(int $timeout): static
    {
        $this->timeout = $timeout;

        return $this;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }
}