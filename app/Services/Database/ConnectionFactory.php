<?php

namespace App\Services\Database;

use App\Services\Config\Config;
use Illuminate\Database\Connection;
use Illuminate\Database\Connectors\MySqlConnector;
use PDO;

/**
 * Class ConnectionFactory
 * @package App\Services\Database
 */
class ConnectionFactory
{
    /**
     * @var MySqlConnector
     */
    protected MySqlConnector $mySqlConnector;

    /**
     * @var Config
     */
    protected Config $config;

    /**
     * ConnectionFactory constructor.
     * @param MySqlConnector $mySqlConnector
     * @param Config $config
     */
    public function __construct(MySqlConnector $mySqlConnector, Config $config)
    {
        $this->mySqlConnector = $mySqlConnector;
        $this->config = $config;
    }

    /**
     * @return Connection
     */
    public function make(): Connection
    {
        $pdo = $this->mySqlConnector->connect([
            'host' => $this->config->get('database.host'),
            'database' => $this->config->get('database.database'),
            'username' => $this->config->get('database.username'),
            'password' => $this->config->get('database.password'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
            'strict' => false,
            'modes' => ['NO_ENGINE_SUBSTITUTION', 'ANSI_QUOTES']
        ]);

        return $this->getConnection($pdo);
    }

    /**
     * @param PDO $pdo
     * @return Connection
     */
    protected function getConnection(PDO $pdo): Connection
    {
        return new Connection(
            $pdo,
            $this->config->get('database.database'),
            '',
            [
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
            ]
        );
    }
}
