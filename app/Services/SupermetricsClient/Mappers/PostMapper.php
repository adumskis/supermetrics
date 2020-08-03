<?php

namespace App\Services\SupermetricsClient\Mappers;

use App\Services\SupermetricsClient\Models\Post;
use DateTime;
use stdClass;

/**
 * Class PostMapper
 * @package App\Services\SupermetricsClient\Mappers
 */
class PostMapper implements MapperInterface
{
    /**
     * @param stdClass $data
     * @return Post
     */
    public function map(stdClass $data): Post
    {
        $post = new Post();
        $post->setId($data->id);
        $post->setFromName($data->from_name);
        $post->setFromId($data->from_id);
        $post->setMessage($data->message);
        $post->setType($data->type);
        $post->setCreatedTime(DateTime::createFromFormat(DateTime::RFC3339, $data->created_time));

        return $post;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return Post::class;
    }
}
