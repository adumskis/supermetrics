<?php

namespace App\Services\SupermetricsClient\Exceptions;

use Exception;

/**
 * Class CouldNotFindResponseMapper
 * @package App\Services\SupermetricsClient\Exceptions
 */
class CouldNotFindResponseMapper extends Exception
{
    /**
     * CouldNotFindResponseMapper constructor.
     * @param string $class
     */
    public function __construct(string $class)
    {
        parent::__construct('Could not find response mapper by class: ' . $class);
    }
}
