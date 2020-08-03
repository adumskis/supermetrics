<?php

namespace App\Services\Cache\Drivers;

/**
 * Interface ConnectionInterface
 * @package App\Services\Cache\Drivers
 */
interface ConnectionInterface
{
    /**
     * @param string $key
     * @param string $value
     * @param int|null $ttl
     * @return void
     */
    public function setKey(string $key, string $value, int $ttl = null): void;

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function getKey(string $key, $default = null);
}
