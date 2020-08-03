<?php

namespace App\Services\SupermetricsClient;

use App\Services\Cache\Cache;

/**
 * Class TokenStorage
 * @package App\Services\SupermetricsClient
 */
class TokenStorage
{
    const TOKEN_TTL = 3540;

    /**
     * @var Cache
     */
    protected Cache $cache;

    /**
     * TokenStorage constructor.
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $clientId
     * @param string $token
     */
    public function setToken(string $clientId, string $token): void
    {
        $this->cache->set($this->getStorageKey($clientId), $token, self::TOKEN_TTL);
    }

    /**
     * @param string $clientId
     * @return string|null
     */
    public function getToken(string $clientId): ?string
    {
        return $this->cache->get($this->getStorageKey($clientId), null);
    }

    /**
     * @param string $clientId
     * @return string
     */
    protected function getStorageKey(string $clientId): string
    {
        return 'token_' . $clientId;
    }
}
