<?php

declare(strict_types=1);

namespace App\Factory;

use App\Document\Link;
use DateTime;

class MusicLink implements LinkFactoryInterface
{
    /**
     * @param array $linkData
     * @return Link\AbstractLink
     */
    public static function createLink(array $linkData): Link\AbstractLink
    {
        return (new Link\MusicListLink\MusicLink())
            ->setTitle($linkData['title'])
            ->setUrl($linkData['url'])
            ->setCreatedAt(new DateTime())
        ;
    }
}