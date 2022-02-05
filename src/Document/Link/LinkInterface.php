<?php

declare(strict_types=1);

namespace App\Document\Link;

interface LinkInterface
{
    public function getNormalizeFields(): array;
}