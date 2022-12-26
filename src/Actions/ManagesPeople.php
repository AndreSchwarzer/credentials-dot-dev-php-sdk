<?php

namespace Web3IsGoingJustGreat\CredentialsDev\SDK\Actions;

use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\CreatePerson;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\Document;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\DocumentStatistics;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\DocumentValidationResponse;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\EmptyResult;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\Person;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\PersonSubscription;
use Web3IsGoingJustGreat\CredentialsDev\SDK\Resources\SubscribePerson;

trait ManagesPeople
{
    /**
     * List all People.
     *
     * @return Person[]
     */
    public function listPeople(): array
    {
        return $this->transformCollection(
            $this->get('people/'), Person::class
        );
    }

    /**
     * Create Person.
     *
     * @param CreatePerson $createPerson
     * @return Person
     */
    public function createPerson(CreatePerson $createPerson): Person
    {
        return new Person($this->post('people/', $createPerson), $this);
    }

    /**
     * Get a person by id.
     *
     * @param string $personId
     * @return Person
     */
    public function getPerson(string $personId): Person
    {
        return new Person($this->get("people/$personId/"), $this);
    }

    /**
     * Delete a person by id.
     *
     * @param string $personId
     * @return EmptyResult
     */
    public function deletePerson(string $personId): EmptyResult
    {
        return new EmptyResult($this->delete("people/$personId/"), $this);
    }

    /**
     * Subscribe to events related to this person.
     *
     * @param string $personId
     * @param SubscribePerson $subscribePerson
     * @return PersonSubscription
     */
    public function subscribeToPersonEvents(string $personId, SubscribePerson $subscribePerson): PersonSubscription
    {
        return new PersonSubscription($this->post("people/$personId/subscribe/", $subscribePerson), $this);
    }

    /**
     * Get all documents related to a person.
     *
     * @param string $personId
     * @return Document[]
     */
    public function listPersonDocuments(string $personId): array
    {
        return $this->transformCollection(
            $this->get("people/$personId/documents/"), Document::class
        );
    }

    /**
     * Create a new document related to a person.
     *
     * @param string $personId
     * @param string $externalIdentifier
     * @param string $documentBinary
     * @return DocumentValidationResponse
     */
    public function createPersonDocument(string $personId, string $externalIdentifier, string $documentBinary): DocumentValidationResponse
    {
        $query = http_build_query([
            'external_identifier' => $externalIdentifier,
        ]);

        return new DocumentValidationResponse(
            $this->post("people/$personId/documents/?$query", ['document' => $documentBinary]),
            $this
        );
    }

    /**
     * Get validations for a single document.
     *
     * @param string $personId
     * @param string $documentId
     * @return DocumentValidationResponse
     */
    public function validatePersonDocument(string $personId, string $documentId): DocumentValidationResponse
    {
        return new DocumentValidationResponse($this->get("people/$personId/documents/$documentId/"), $this);
    }

    /**
     * Delete a document by id.
     *
     * @param string $personId
     * @param string $documentId
     * @return EmptyResult
     */
    public function deletePersonDocument(string $personId, string $documentId): EmptyResult
    {
        return new EmptyResult($this->get("people/$personId/documents/$documentId/"), $this);
    }

    /**
     * Get validations for a single document.
     *
     * @param string $personId
     * @param string $documentId
     * @return DocumentStatistics
     */
    public function statsForPersonDocument(string $personId, string $documentId): DocumentStatistics
    {
        return new DocumentStatistics($this->get("people/$personId/documents/$documentId/stats/"), $this);
    }
}