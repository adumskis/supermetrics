<?php

namespace App\Services\Cache\Drivers\RedisDriver;

use App\Services\Cache\Drivers\ConnectionInterface;
use App\Services\Config\Config;
use Redis;

/**
 * Class Connection
 * @package App\Services\Cache\Drivers\RedisDriver
 */
class Connection implements ConnectionInterface
{
    /**
     * @var Redis
     */
    protected Redis $redis;

    /**
     * @var Config
     */
    protected Config $config;

    /**
     * Connection constructor.
     * @param Redis $redis
     * @param Config $config
     */
    public function __construct(Redis $redis, Config $config)
    {
        $this->redis = $redis;
        $this->config = $config;
    }

    /**
     * Connection destructor.
     */
    public function __destruct()
    {
        $this->close();
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getKey(string $key, $default = null)
    {
        if (!$this->redis->isConnected()) {
            $this->connect();
        }

        $value = $this->redis->get($key);
        if ($value === false) {
            return $default;
        }

        return $value;
    }

    /**
     * @param string $key
     * @param string $value
     * @param int|null $ttl
     */
    public function setKey(string $key, string $value, int $ttl = null): void
    {
        if (!$this->redis->isConnected()) {
            $this->connect();
        }

        $timeout = [];
        if ($ttl) {
            $timeout['EX'] = $ttl;
        }
        $this->redis->set($key, $value, $timeout);
    }

    /**
     * @return bool
     */
    public function connect(): bool
    {
        return $this->redis->connect(
            $this->config->get('redis.host'),
            $this->config->get('redis.port'),
            $this->config->get('timeout', 0.0),
            $this->config->get('reserved', null),
            $this->config->get('retry_interval', 0),
            $this->config->get('readTimeout', 0.0)
        );
    }

    /**
     * @return void
     */
    public function close(): void
    {
        $this->redis->close();
    }
}
