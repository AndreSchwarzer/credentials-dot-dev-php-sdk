<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

use Carbon\CarbonImmutable;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Credentials;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Interfaces\Arrayable as ArrayableInterface;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Traits\Arrayable as ArrayableTrait;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Resources/Resource.php
 */
abstract class Resource implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * The resource attributes.
     */
    public array $attributes;

    /**
     * The Credentials.dev SDK instance.
     */
    protected ?Credentials $credentialsSdkInstance;

    /**
     * Look-up-table to support fill() method.
     */
    protected array $attributesLookup = [];

    /**
     * Create a new resource instance.
     */
    public function __construct(array $attributes = [], ?Credentials $credentialsSdkInstance = null)
    {
        $this->attributes = $attributes;
        $this->credentialsSdkInstance = $credentialsSdkInstance;

        $this->fill();
    }

    /**
     * Fill the resource with the array of attributes.
     */
    protected function fill(): void
    {
        foreach ($this->attributes as $key => $value) {
            $key = $this->camelCase($key);

            if (isset($this->attributesLookup[$key])) {
                if (CarbonImmutable::class === ltrim($this->attributesLookup[$key], '\\')) {
                    $this->{$key} = CarbonImmutable::parse($value);
                } elseif (is_subclass_of($this->attributesLookup[$key], __CLASS__)) {
                    $this->{$key} = new $this->attributesLookup[$key]($value, $this->credentialsSdkInstance);
                } else {
                    $this->{$key} = $this->attributesLookup[$key]::tryFrom($value);
                }
            } else {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * Convert the key name to camel case.
     */
    protected function camelCase(string $key): string
    {
        $parts = explode('_', $key);

        foreach ($parts as $i => $part) {
            if ($i !== 0) {
                $parts[$i] = ucfirst($part);
            }
        }

        return lcfirst(str_replace(' ', '', implode(' ', $parts)));
    }

    /**
     * Transform the items of the collection to the given class.
     */
    protected function transformCollection(array $collection, string $class, array $extraData = []): array
    {
        return array_map(function ($data) use ($class, $extraData) {
            return new $class($data + $extraData, $this->credentialsSdkInstance);
        }, $collection);
    }

    /**
     * Transform the collection of tags to a string.
     */
    protected function transformTags(array $tags, string $separator = ', '): string
    {
        return implode($separator, array_column($tags ?? [], 'name'));
    }
}
