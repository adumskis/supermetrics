<?php

namespace App\Services\SupermetricsClient\Mappers;

use App\Services\SupermetricsClient\Models\ModelInterface;
use stdClass;

/**
 * Interface MapperInterface
 * @package App\Services\SupermetricsClient\Mappers
 */
interface MapperInterface
{
    /**
     * @param stdClass $data
     * @return ModelInterface
     */
    public function map(stdClass $data): ModelInterface;

    /**
     * @return string
     */
    public function getClass(): string;
}
