<?php

declare(strict_types=1);

namespace App\Factory;

use App\Document\Link;
use App\Document\Link\AbstractLink;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class MusicListLink implements LinkFactoryInterface
{
    /**
     * @inheritDoc
     */
    public static function createLink(array $linkData): AbstractLink
    {
        $musicListLink = (new Link\MusicListLink())
            ->setTitle($linkData['title'])
            ->setUrl($linkData['url'])
            ->setCreatedAt(new DateTime())
        ;

        $musicLinks = new ArrayCollection();

        foreach ($linkData['musicLinks'] as $musicLink) {
            $musicLinks[] = MusicLink::createLink($musicLink);
        }

        $musicListLink->setMusicLinks($musicLinks);

        return $musicListLink;
    }
}