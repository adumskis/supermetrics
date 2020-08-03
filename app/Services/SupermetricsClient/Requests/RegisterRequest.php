<?php

namespace App\Services\SupermetricsClient\Requests;

/**
 * Class RegisterRequest
 * @package App\Services\SupermetricsClient\Requests
 */
class RegisterRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected string $clientId;

    /**
     * @var string
     */
    protected string $email;

    /**
     * @var string
     */
    protected string $name;

    /**
     * @param string $clientId
     */
    public function setClientId(string $clientId): void
    {
        $this->clientId = $clientId;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/assignment/register';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [
            'content-type' => 'application/json',
        ];
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [
            'client_id' => $this->clientId,
            'email' => $this->email,
            'name' => $this->name,
        ];
    }
}
