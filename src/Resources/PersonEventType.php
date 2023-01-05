<?php

declare(strict_types = 1);

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

enum PersonEventType: string
{
    case DOCUMENT_VALIDATION_UPDATED = 'DOCUMENT_VALIDATION_UPDATED';
    case DOCUMENT_REVOKED = 'DOCUMENT_REVOKED';
    case DOCUMENT_STATISTICS_UPDATED = 'DOCUMENT_STATISTICS_UPDATED';
}
