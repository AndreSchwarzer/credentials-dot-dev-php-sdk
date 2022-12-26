<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Resources;

enum InstitutionType: string
{
    case ENTERPRISE = 'ENTERPRISE';
    case SCHOOL = 'SCHOOL';
    case UNIVERSITY = 'UNIVERSITY';
    case GOVERNMENT = 'GOVERNMENT';
    case INDIVIDUAL = 'INDIVIDUAL';
    case STARTUP = 'STARTUP';
    case SMB = 'SMB';
}
