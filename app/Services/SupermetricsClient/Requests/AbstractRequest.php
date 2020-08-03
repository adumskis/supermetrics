<?php

namespace App\Services\SupermetricsClient\Requests;

/**
 * Class AbstractRequest
 * @package App\Services\SupermetricsClient\Requests
 */
abstract class AbstractRequest
{
    /**
     * @return string
     */
    abstract public function getMethod(): string;

    /**
     * @return string
     */
    abstract public function getUri(): string;

    /**
     * @return array
     */
    public function getBody(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return [];
    }

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return [];
    }
}
