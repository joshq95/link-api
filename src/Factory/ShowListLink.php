<?php

declare(strict_types=1);

namespace App\Factory;

use App\Document\Link;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;

class ShowListLink implements LinkFactoryInterface
{
    /**
     * @param array $linkData
     * @return Link\AbstractLink
     */
    public static function createLink(array $linkData): Link\AbstractLink
    {
        $showListLink = (new Link\ShowListLink())
            ->setTitle($linkData['title'])
            ->setUrl($linkData['url'])
            ->setCreatedAt(new DateTime())
        ;

        $showLinks = new ArrayCollection();

        foreach ($linkData['showLinks'] as $showLink) {
            $showLinks[] = ShowLink::createLink($showLink);
        }

        $showListLink->setShowLinks($showLinks);

        return $showListLink;
    }
}