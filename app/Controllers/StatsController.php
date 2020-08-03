<?php

namespace App\Controllers;

use App\Repositories\StatsRepository;
use Illuminate\Support\Collection;

/**
 * Class StatsControllers
 * @package App\Controller
 */
class StatsController
{
    /**
     * @var StatsRepository
     */
    protected StatsRepository $statsRepository;

    /**
     * StatsController constructor.
     * @param StatsRepository $statsRepository
     */
    public function __construct(StatsRepository $statsRepository)
    {
        $this->statsRepository = $statsRepository;
    }

    /**
     * @return Collection
     */
    public function getAveragePostsLengthByMonths(): Collection
    {
        return $this->statsRepository->getAveragePostsLengthByMonths();
    }

    /**
     * @return Collection
     */
    public function getLongestPostsByMonths(): Collection
    {
        return $this->statsRepository->getLongestPostsByMonths();
    }

    /**
     * @return Collection
     */
    public function getPostsCountByWeeks(): Collection
    {
        return $this->statsRepository->getPostsCountByWeeks();
    }

    /**
     * @return Collection
     */
    public function getAveragePostsCountPerUserByMonths(): Collection
    {
        return $this->statsRepository->getAveragePostsCountPerUserByMonths();
    }
}
