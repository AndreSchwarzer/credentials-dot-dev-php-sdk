<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Interfaces;

interface Arrayable
{
    /**
     * @phpstan-return array<string, mixed>
     */
    public function toArray(): array;
}