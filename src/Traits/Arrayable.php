<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Traits;

use Carbon\CarbonImmutable;
use BackedEnum;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Interfaces\Arrayable as ArrayableInterface;
use function get_object_vars;
use function array_map;

trait Arrayable
{
    /**
     * @phpstan-return array<string, mixed>
     */
    public function toArray(): array
    {
        $returnArray = array_map(
            static function ($item) {
                if ($item instanceof CarbonImmutable) {
                    return $item->format('Y-m-d\TH:i:s.u\Z');
                }

                if ($item instanceof ArrayableInterface) {
                    return $item->toArray();
                }

                if ($item instanceof BackedEnum) {
                    return $item->value;
                }

                return $item;
            },
            get_object_vars($this)
        );

        unset($returnArray['attributes'], $returnArray['attributesLookup'], $returnArray['credentialsSdkInstance']);

        return $returnArray;
    }
}