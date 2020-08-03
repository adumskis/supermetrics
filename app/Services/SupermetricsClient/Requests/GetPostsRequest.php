<?php

namespace App\Services\SupermetricsClient\Requests;

/**
 * Class GetPostsRequest
 * @package App\Services\SupermetricsClient\Requests
 */
class GetPostsRequest extends AbstractRequest
{
    /**
     * @var string
     */
    protected string $slToken;

    /**
     * @var int
     */
    protected int $page;

    /**
     * @param string $slToken
     */
    public function setSlToken(string $slToken): void
    {
        $this->slToken = $slToken;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/assignment/posts';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'GET';
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
    public function getQuery(): array
    {
        return [
            'sl_token' => $this->slToken,
            'page' => $this->page,
        ];
    }
}
