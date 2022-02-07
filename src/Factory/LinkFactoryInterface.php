<?php

namespace App\Factory;

use App\Document\Link\AbstractLink;

interface LinkFactoryInterface
{
    /**
     * @param array $linkData
     * @return AbstractLink
     */
    public static function createLink(array $linkData): AbstractLink;
}
