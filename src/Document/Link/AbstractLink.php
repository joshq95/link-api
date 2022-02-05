<?php

declare(strict_types=1);

namespace App\Document\Link;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use DateTime;

/** @ODM\MappedSuperclass */
abstract class AbstractLink
{
    /**
     * @var string
     * @ODM\Id(strategy="AUTO", type="string")
     */
    protected string $id;

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
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return AbstractLink
     */
    public function setId(string $id): AbstractLink
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