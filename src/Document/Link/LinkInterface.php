<?php

declare(strict_types=1);

namespace App\Document\Link;

use DateTime;

interface LinkInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getTitle(): string;

    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return DateTime
     */
    public function getCreatedAt(): DateTime;

    /**
     * @return string
     */
    public function getLinkType(): string;
}
