<?php

namespace App\Jobs;

/**
 * Interface JobInterface
 * @package App\Jobs
 */
interface JobInterface
{
    /**
     * @return void
     */
    public function process(): void;
}
