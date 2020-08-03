<?php

namespace App\Services\SupermetricsClient\Mappers;

use App\Services\SupermetricsClient\Models\Post;
use App\Services\SupermetricsClient\Models\PostsCollection;
use stdClass;

/**
 * Class PostsCollectionMapper
 * @package App\Services\SupermetricsClient\Mappers
 */
class PostsCollectionMapper implements MapperInterface
{
    /**
     * @var PostMapper
     */
    protected PostMapper $postMapper;

    /**
     * PostsCollectionMapper constructor.
     * @param PostMapper $postMapper
     */
    public function __construct(PostMapper $postMapper)
    {
        $this->postMapper = $postMapper;
    }

    /**
     * @param stdClass $data
     * @return PostsCollection
     */
    public function map(stdClass $data): PostsCollection
    {
        $postsCollection = new PostsCollection();
        $postsCollection->setPage($data->page);
        $postsCollection->setPosts($this->getPosts($data->posts));

        return $postsCollection;
    }

    /**
     * @param array $rawPosts
     * @return Post[]
     */
    protected function getPosts(array $rawPosts): array
    {
        $posts = [];

        foreach ($rawPosts as $rawPost) {
            $posts[] = $this->postMapper->map($rawPost);
        }

        return $posts;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return PostsCollection::class;
    }
}
