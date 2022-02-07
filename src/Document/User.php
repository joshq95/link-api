<?php

declare(strict_types=1);

namespace App\Document;

use App\Document\Link\LinkInterface;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ODM\Document(collection="users")
 * @ODM\Index(keys={"username"="desc"}, options={"unique"=true})
 */
class User
{
    /**
     * @var int
     * @ODM\Id(strategy="INCREMENT", type="int")
     */
    protected int $id;

    /**
     * @var string
     * @Assert\NotBlank
     * @ODM\Field(type="string")
     */
    protected string $username;

    /**
     * @var string
     * @Assert\Url(
     *    message = "The User imageUrl '{{ value }}' is not a valid url",
     * )
     * @ODM\Field(type="string")
     */
    protected string $imageUrl;

    /**
     * @todo: add custom collection for allowing sorting by date created
     * @var Collection<LinkInterface>
     * @ODM\EmbedMany(discriminatorField="type")
     */
    protected Collection $links;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Collection
     */
    public function getLinks(): Collection
    {
        return $this->links;
    }

    /**
     * @param Collection $links
     * @return User
     */
    public function setLinks(Collection $links): User
    {
        $this->links = $links;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return User
     */
    public function setUsername(string $username): User
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * @param string $imageUrl
     * @return User
     */
    public function setImageUrl(string $imageUrl): User
    {
        $this->imageUrl = $imageUrl;
        return $this;
    }
}
