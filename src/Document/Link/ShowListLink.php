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
    public const LINK_TYPE = 'showList';

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

/**
 * NOTES:
 *
 * Figure out how to create the database in mongodb
 * I managed to install the package, just need to figure out the db side of things
 *
 * Find a good schema for persisting the data
 * Currently using an abstract class for all link types, but there might be a cleaner solution.
 * Also need to look at best ways to embed the links in the user and looking at nesting more data.
 * This is something to flag as a concern depending on how complex these links might become.
 *
 * Need to think about factories/deserializers for creation of these links.
 *
 * Create endpoint for retrieving a users links
 * Allow for sorting by createdDate
 *
 * Create endpoint for creating/updating a link
 *
 * Create fixtures for the documents
 * Create tests for the documents
 *
 * Write up readme and design decisions
 * So for, I initially thought of going with what I knew best,
 * but soon realised that this problem required a NOSQL solution.
 *
 * I came to this conclusion as I saw that we want to store numerous types of links
 * and each link can have different requirements.
 *
 * NoSQL will also allow an easier adoption for newer links as we don't care about the
 * structure of the link, other than the base/abstract link.
 *
 */