<?php

declare(strict_types=1);

namespace App\Document;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(
 *     collection="users",
 *     repositoryClass="App\Repository\UserRepository"
 * )
 * @ODM\Index(keys={"username"="desc"}, options={"unique"=true})
 */
class User
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
    protected string $username;

    /**
     * @var string
     * @ODM\Field(type="string")
     */
    protected string $imageUrl;

    /**
     * @var Collection
     * @ODM\EmbedMany(discriminatorField="type")
     */
    protected Collection $links;

    /**
     * @return int
     */
    public function getId(): string
    {
        return $this->string;
    }

    /**
     * @param string $id
     * @return User
     */
    public function setId(string $id): User
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
}
