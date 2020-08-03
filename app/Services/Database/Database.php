<?php

namespace App\Services\Database;

use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder as QueryBuilder;
use Illuminate\Database\Schema\Builder as SchemaBuilder;

/**
 * Class Database
 * @package App\Services\Database
 */
class Database
{
    /**
     * @var Connection
     */
    protected Connection $connection;

    /**
     * Database constructor.
     * @param ConnectionFactory $connectionFactory
     */
    public function __construct(ConnectionFactory $connectionFactory)
    {
        $this->connection = $connectionFactory->make();
    }

    /**
     * @param string $table
     * @return QueryBuilder
     */
    public function query(string $table): QueryBuilder
    {
        return $this->connection->table($table);
    }

    /**
     * @return SchemaBuilder
     */
    public function schema(): SchemaBuilder
    {
        return $this->connection->getSchemaBuilder();
    }
}
