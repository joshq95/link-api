<?php

declare(strict_types=1);

namespace App\Document\Link\MusicListLink;

use App\Document\Link\AbstractLink;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\EmbeddedDocument
 */
class MusicLink extends AbstractLink
{
    public const LINK_TYPE = 'musicLink';
}
