<?php

namespace App\Services\Config;

use Symfony\Component\Yaml\Yaml;

/**
 * Class Builder
 * @package App\Services\Config
 */
class Builder
{
    const CONFIG_DIR = 'config';

    /**
     * @var string
     */
    protected string $appPath;

    /**
     * Builder constructor.
     * @param string $appPath
     */
    public function __construct(string $appPath)
    {
        $this->appPath = $appPath;
    }

    /**
     * @return array
     */
    public function build(): array
    {
        $config = [];

        foreach ($this->getFiles() as $file) {
            [$configKey] = explode('.', $file);

            $config[$configKey] = Yaml::parseFile($this->appPath . '/' . self::CONFIG_DIR . '/' . $file);
        }

        return $config;
    }

    /**
     * @return array
     */
    protected function getFiles(): array
    {
        $files = scandir($this->appPath . '/' . self::CONFIG_DIR);

        return array_diff($files, ['.', '..']);
    }
}
