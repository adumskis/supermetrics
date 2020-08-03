<?php

namespace App\Services\Cache;

use App\Services\Cache\Drivers\ConnectionInterface;

/**
 * Class Cache
 * @package App\Services\Cache
 */
class Cache
{
    /**
     * @var ConnectionInterface
     */
    protected ConnectionInterface $connection;

    /**
     * Cache constructor.
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->connection->getKey($key, $default);
    }

    /**
     * @param string $key
     * @param string $value
     * @param int|null $ttl
     */
    public function set(string $key, string $value, int $ttl = null)
    {
        $this->connection->setKey($key, $value, $ttl);
    }
}
