<?php

declare(strict_types=1);

namespace App\Document\Link;

use App\Document\User;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use DateTime;

/** @ODM\MappedSuperclass */
abstract class AbstractLink implements LinkInterface
{
    /**
     * @var int
     * @ODM\Id(strategy="INCREMENT", type="int")
     */
    protected int $id;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected string $title;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected string $url;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected string $linkType;

    /**
     * @var DateTime
     * @ODM\Field(type="date")
     */
    protected DateTime $createdAt;

    /**
     * @var DateTime
     * @ODM\Field(type="date")
     */
    protected DateTime $updatedAt;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return AbstractLink
     */
    public function setId(int $id): AbstractLink
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return AbstractLink
     */
    public function setTitle(string $title): AbstractLink
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return AbstractLink
     */
    public function setUrl(string $url): AbstractLink
    {
        $this->url = $url;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime $createdAt
     * @return AbstractLink
     */
    public function setCreatedAt(DateTime $createdAt): AbstractLink
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    /**
     * @return DateTime
     */
    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $updatedAt
     * @return AbstractLink
     */
    public function setUpdatedAt(DateTime $updatedAt): AbstractLink
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return string
     */
    public function getLinkType(): string
    {
        return $this->linkType;
    }

    /**
     * @param string $linkType
     * @return AbstractLink
     */
    public function setLinkType(string $linkType): AbstractLink
    {
        $this->linkType = $linkType;
        return $this;
    }
}