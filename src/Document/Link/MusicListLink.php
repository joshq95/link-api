<?php

declare(strict_types=1);

namespace App\Document\Link;

use App\Document\Link\MusicListLink\MusicLink;
use Doctrine\Common\Collections\Collection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;


/**
 * @ODM\Document(collection="links")
 * @ODM\DiscriminatorField("type")
 */
class MusicListLink extends AbstractLink
{
    public const LINK_TYPE = 'musicLink';

    /**
     * @var Collection
     * @ODM\EmbedMany(targetDocument=MusicLink::class)
     */
    protected Collection $musicLinks;

    /**
     * @return Collection
     */
    public function getMusicLinks(): Collection
    {
        return $this->musicLinks;
    }

    /**
     * @param Collection $musicLinks
     * @return MusicListLink
     */
    public function setMusicLinks(Collection $musicLinks): MusicListLink
    {
        $this->musicLinks = $musicLinks;
        return $this;
    }
}