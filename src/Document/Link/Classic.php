<?php

declare(strict_types=1);

namespace App\Document\Link;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(collection="links")
 * @ODM\DiscriminatorField("type")
 */
class Classic extends AbstractLink
{
    public const LINK_TYPE = 'classic';
}