<?php

namespace App\Services\SupermetricsClient\Models;

/**
 * Class Register
 * @package App\Services\SupermetricsClient\Models
 */
class Register implements ModelInterface
{
    /**
     * @var string
     */
    protected string $slToken;

    /**
     * @var string
     */
    protected string $clientId;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @return string
     */
    public function getSlToken(): string
    {
        return $this->slToken;
    }

    /**
     * @param string $slToken
     */
    public function setSlToken(string $slToken): void
    {
        $this->slToken = $slToken;
    }

    /**
     * @return string
     */
    public function getClientId(): string
    {
        return $this->clientId;
    }

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
