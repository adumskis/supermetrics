<?php

namespace App\Services\Config;

/**
 * Class Config
 * @package App\Services\Config
 */
class Config
{
    /**
     * @var array
     */
    protected array $config;

    /**
     * Config constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder)
    {
        $this->config = $builder->build();
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public function get(string $key, $default = null)
    {
        return $this->getValueByKey($key, $default);
    }

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    protected function getValueByKey(string $key, $default = null)
    {
        $data = $this->config;

        if (empty($key) || !count($data)) {
            return $default;
        }

        if (strpos($key, '.') !== false) {
            $keys = explode('.', $key);

            foreach ($keys as $innerKey) {
                if (!array_key_exists($innerKey, $data)) {
                    return $default;
                }

                $data = $data[$innerKey];
            }

            return $data;
        }

        return array_key_exists($key, $data) ? $data[$key] : $default;
    }
}
