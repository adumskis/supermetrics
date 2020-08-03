<?php

namespace App\Jobs;

use App\Repositories\StatsRepository;
use App\Services\SupermetricsClient\Supermetrics;
use App\Services\SupermetricsClient\Exceptions\CouldNotFindResponseMapper;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class FetchPostsJob
 * @package App\Jobs
 */
class FetchPostsJob implements JobInterface
{
    const MAX_PAGES = 10;

    /**
     * @var Supermetrics
     */
    protected Supermetrics $supermetrics;

    /**
     * @var StatsRepository
     */
    protected StatsRepository $statsRepository;

    /**
     * FetchPostsJob constructor.
     * @param Supermetrics $supermetrics
     * @param StatsRepository $statsRepository
     */
    public function __construct(Supermetrics $supermetrics, StatsRepository $statsRepository)
    {
        $this->supermetrics = $supermetrics;
        $this->statsRepository = $statsRepository;
    }

    /**
     * @throws CouldNotFindResponseMapper
     * @throws GuzzleException
     */
    public function process(): void
    {
        $this->statsRepository->truncate();

        $page = 1;
        while ($page <= self::MAX_PAGES) {
            $postsCollection = $this->supermetrics->getPosts($page);
            $this->statsRepository->storeMany($postsCollection->getPosts());

            $page++;
        };
    }
}
