<?php

namespace App\Services\SupermetricsClient\Models;

use DateTime;

/**
 * Class Post
 * @package App\Services\SupermetricsClient\Models
 */
class Post implements ModelInterface
{
    /**
     * @var string
     */
    protected string $id;

    /**
     * @var string
     */
    protected string $fromName;

    /**
     * @var string
     */
    protected string $fromId;

    /**
     * @var string
     */
    protected string $message;

    /**
     * @var string
     */
    protected string $type;

    /**
     * @var DateTime
     */
    protected DateTime $createdTime;

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFromName(): string
    {
        return $this->fromName;
    }

    /**
     * @param string $fromName
     */
    public function setFromName(string $fromName): void
    {
        $this->fromName = $fromName;
    }

    /**
     * @return string
     */
    public function getFromId(): string
    {
        return $this->fromId;
    }

    /**
     * @param string $fromId
     */
    public function setFromId(string $fromId): void
    {
        $this->fromId = $fromId;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return DateTime
     */
    public function getCreatedTime(): DateTime
    {
        return $this->createdTime;
    }

    /**
     * @param DateTime $createdTime
     */
    public function setCreatedTime(DateTime $createdTime): void
    {
        $this->createdTime = $createdTime;
    }
}
