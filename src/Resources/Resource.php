<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

use BackedEnum;
use Carbon\CarbonImmutable;
use DateTimeInterface;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Credentials;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Interfaces\Arrayable as ArrayableInterface;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Traits\Arrayable as ArrayableTrait;

/**
 * @see https://raw.githubusercontent.com/laravel/forge-sdk/3.x/src/Resources/Resource.php
 *
 * @template T
 */
abstract class Resource implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * The resource attributes.
     *
     * @phpstan-var array<string|int, mixed>
     */
    public array $attributes;

    /**
     * The Credentials.dev SDK instance.
     */
    protected ?Credentials $credentialsSdkInstance;

    /**
     * Look-up-table to support fill() method.
     *
     * @phpstan-var array<string, string|array<string,string>>
     */
    protected array $attributesLookup = [];

    /**
     * Create a new resource instance.
     *
     * @phpstan-param array<string|int, mixed> $attributes
     * @phpstan-param Credentials|null $credentialsSdkInstance
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
            if (isset($this->attributesLookup[$key])) {
                if ( (is_string($value) || (is_object($value) && is_a($value, DateTimeInterface::class)))
                    && (is_string($this->attributesLookup[$key]) && CarbonImmutable::class === ltrim($this->attributesLookup[$key], '\\'))
                ) {
                    $this->{$key} = CarbonImmutable::parse($value);
                } elseif (is_string($this->attributesLookup[$key]) && is_subclass_of($this->attributesLookup[$key], __CLASS__)) {
                    $this->{$key} = new $this->attributesLookup[$key]($value, $this->credentialsSdkInstance);
                } elseif (is_string($this->attributesLookup[$key]) && (is_string($value) || is_int($value)) && is_subclass_of($this->attributesLookup[$key], BackedEnum::class)) {
                    $this->{$key} = $this->attributesLookup[$key]::tryFrom($value);
                }
            } elseif (isset($this->attributesLookup['array_types'][$key]) && is_array($value)) {
                $class = $this->attributesLookup['array_types'][$key];

                $this->{$key} = array_map(function ($data) use ($class) {
                    return new $class($data, $this->credentialsSdkInstance);
                }, $value);
            } else {
                $this->{$key} = $value;
            }
        }
    }

// TODO
//    /**
//     * Transform the items of the collection to the given class.
//     */
//    protected function transformCollection(array $collection, string $class, array $extraData = []): array
//    {
//        return array_map(function ($data) use ($class, $extraData) {
//            return new $class($data + $extraData, $this->credentialsSdkInstance);
//        }, $collection);
//    }
}
