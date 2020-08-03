<?php

namespace App\Repositories;

use App\Services\SupermetricsClient\Models\Post;
use Illuminate\Support\Collection;

/**
 * Class StatsRepository
 * @package App\Repositories
 */
class StatsRepository extends BaseRepository
{
    /**
     * @param Post[] $posts
     */
    public function storeMany(array $posts): void
    {
        $stats = array_map(function (Post $post) {
            return [
                'post_id' => $post->getId(),
                'user_id' => $post->getFromId(),
                'post_length' => strlen($post->getMessage()),
                'created_month' => $post->getCreatedTime()->format('n'),
                'created_week' => $post->getCreatedTime()->format('W')
            ];
        }, $posts);

        $this->query()->insert($stats);
    }

    /**
     * @return Collection
     */
    public function getAveragePostsLengthByMonths(): Collection
    {
        return $this->query()
            ->selectRaw('created_month, round(avg(post_length)) as average_length')
            ->groupBy('created_month')
            ->get();
    }

    /**
     * @return Collection
     */
    public function getLongestPostsByMonths(): Collection
    {
        return $this->query()
            ->selectRaw('created_month, post_id, MAX(post_length) as max_length')
            ->groupBy('created_month')
            ->get();
    }

    /**
     * @return Collection
     */
    public function getPostsCountByWeeks(): Collection
    {
        return $this->query()
            ->selectRaw('created_week, count(*) as posts_count')
            ->groupBy('created_week')
            ->get();
    }

    /**
     * @return Collection
     */
    public function getAveragePostsCountPerUserByMonths(): Collection
    {
        return $this->query()
            ->selectRaw('created_month, round((count(distinct post_id) / count(distinct user_id))) as average_count')
            ->groupBy('created_month')
            ->get();
    }

    /**
     * @return void
     */
    public function truncate(): void
    {
        $this->query()->truncate();
    }


    /**
     * @return string
     */
    protected function getTable(): string
    {
        return 'stats';
    }
}
