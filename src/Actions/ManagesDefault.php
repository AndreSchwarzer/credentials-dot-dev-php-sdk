<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Actions;

use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\APIStatus;

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
}