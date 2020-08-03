<?php

namespace App\Services\SupermetricsClient\Models;

/**
 * Class PostsCollection
 * @package App\Services\SupermetricsClient\Models
 */
class PostsCollection implements ModelInterface
{
    /**
     * @var Post[]
     */
    protected array $posts;

    /**
     * @var int
     */
    protected int $page;

    /**
     * @return Post[]
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @param Post[] $posts
     */
    public function setPosts(array $posts): void
    {
        $this->posts = $posts;
    }

    /**
     * @return int
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage(int $page): void
    {
        $this->page = $page;
    }
}
