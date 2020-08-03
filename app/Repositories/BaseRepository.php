<?php

namespace App\Repositories;

use App\Services\Database\Database;
use Illuminate\Database\Query\Builder;

/**
 * Class BaseRepository
 * @package App\Repositories
 */
abstract class BaseRepository
{
    /**
     * @var Database
     */
    protected Database $database;

    /**
     * BaseRepository constructor.
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    /**
     * @return string
     */
    abstract protected function getTable(): string;

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->database->query($this->getTable());
    }
}
