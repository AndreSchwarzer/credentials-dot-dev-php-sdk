<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK;

use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\FailedActionException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\NotAuthenticatedException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\NotAuthorizedException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\NotFoundException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\TimeoutException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\ValidationException;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\Resource;
use Exception;
use Psr\Http\Message\ResponseInterface;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/MakesHttpRequests.php
 */
trait MakesHttpRequests
{
    /**
     * Make a GET request to Credentials.dev servers and return the response.
     *
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function get(string $uri): array
    {
        return $this->request('GET', $uri);
    }

    /**
     * Make a POST request to Credentials.dev servers and return the response.
     *
     * @template T of Resource
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function post(string $uri, Resource|array $payload = []): array
    {
        return $this->request('POST', $uri, $payload);
    }

    /**
     * Make a PUT request to Credentials.dev servers and return the response.
     *
     * @template T of Resource
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function put(string $uri, Resource|array $payload = []): array
    {
        return $this->request('PUT', $uri, $payload);
    }

    /**
     * Make a PATCH request to Credentials.dev servers and return the response.
     *
     * @template T of Resource
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function patch(string $uri, Resource|array $payload = []): array
    {
        return $this->request('PATCH', $uri, $payload);
    }

    /**
     * Make a DELETE request to Credentials.dev servers and return the response.
     *
     * @template T of Resource
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    public function delete(string $uri, Resource|array $payload = []): array
    {
        return $this->request('DELETE', $uri, $payload);
    }

    /**
     * Make request to Credentials.dev servers and return the response.
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws Exception
     *
     * @template T of Resource
     * @phpstan-param T|array<int|string, mixed>|array{} $payload
     * @phpstan-return array<int|string, mixed>|array{}
     */
    protected function request(string $verb, string $uri, Resource|array $payload = []): array
    {
        if (is_object($payload) && is_a($payload, Resource::class)) {
            $payload = ['json' => $payload->toArray()];
        } else {
            if (isset($payload['json'])) {
                $payload = ['json' => $payload['json']];
            } else {
                $payload = empty($payload) ? [] : ['form_params' => $payload];
            }
        }

        $response = $this->guzzleClient->request($verb, $uri, $payload);

        $statusCode = $response->getStatusCode();

        if ($statusCode < 200 || $statusCode > 299) {
            $this->handleRequestError($response);
        }

        $responseBody = (string)$response->getBody();

        if ('[]' === $responseBody) {
            return [];
        }

        try {
            return (array) json_decode($responseBody, true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $exception) {
            throw new FailedActionException($exception->getMessage());
        }
    }

    /**
     * Handle the request error.
     */
    protected function handleRequestError(ResponseInterface $response): void
    {
        if ($response->getStatusCode() == 422) {
            throw new ValidationException((array) json_decode((string)$response->getBody(), true));
        }

        if ($response->getStatusCode() == 401) {
            throw new NotAuthenticatedException();
        }

        if ($response->getStatusCode() == 403) {
            throw new NotAuthorizedException();
        }

        if ($response->getStatusCode() == 404) {
            throw new NotFoundException((string)$response->getBody());
        }

        if ($response->getStatusCode() == 400) {
            throw new FailedActionException((string)$response->getBody());
        }

        throw new Exception((string)$response->getBody());
    }

    /**
     * Retry the callback or fail after x seconds.
     *
     * @throws \Web3IsGoingJustGreat\CredentialsDev\SDK\Exceptions\TimeoutException
     */
    public function retry(int $timeout, callable $callback, int $sleep = 5): mixed
    {
        $start = time();

        beginning:

        if ($output = $callback()) {
            return $output;
        }

        if (time() - $start < $timeout) {
            sleep($sleep);

            goto beginning;
        }

        throw new TimeoutException((array) $output);
    }
}
