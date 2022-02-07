<?php

declare(strict_types=1);

namespace App\Factory;

use App\Document\Link\AbstractLink;
use App\Document\Link\ShowListLink;
use DateTime;

class ShowLink implements LinkFactoryInterface
{
    /**
     * @param array $linkData
     * @return AbstractLink
     */
    public static function createLink(array $linkData): AbstractLink
    {
        return (new ShowListLink\ShowLink())
            ->setTitle($linkData['title'])
            ->setUrl($linkData['url'])
            ->setCreatedAt(new DateTime())
        ;
    }
}