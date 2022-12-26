<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

enum Cert4TrustValidationStatus: string
{
    case REVOKED = 'REVOKED';
    case REMOVED = 'REMOVED';
    case VALID = 'VALID';
}
