<?php

declare(strict_types=1);

namespace App\Document\Link;

use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use App\Document\Link\ShowListLink\ShowLink;

/**
 * @ODM\Document(collection="links")
 * @ODM\InheritanceType("SINGLE_COLLECTION")
 */
class ShowListLink extends AbstractLink
{
    public const LINK_TYPE = 'showListLink';

    /**
     * @var Collection
     * @ODM\EmbedMany(targetDocument=ShowLink::class)
     */
    protected Collection $showLinks;

    /**
     * @return Collection
     */
    public function getShowLinks(): Collection
    {
        return $this->showLinks;
    }

    /**
     * @param Collection $showLinks
     * @return ShowListLink
     */
    public function setShowLinks(Collection $showLinks): ShowListLink
    {
        $this->showLinks = $showLinks;
        return $this;
    }
}