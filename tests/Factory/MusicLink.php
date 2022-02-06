<?php

declare(strict_types=1);

namespace App\Tests\Factory;

use App\Document\Link;
use DateTime;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Link\MusicLink>
 *
 * @method static Link\MusicLink|Proxy createOne(array $attributes = [])
 * @method static Link\MusicLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Link\MusicLink|Proxy find(object|array|mixed $criteria)
 * @method static Link\MusicLink|Proxy findOrCreate(array $attributes)
 * @method static Link\MusicLink|Proxy first(string $sortedField = 'id')
 * @method static Link\MusicLink|Proxy last(string $sortedField = 'id')
 * @method static Link\MusicLink|Proxy random(array $attributes = [])
 * @method static Link\MusicLink|Proxy randomOrCreate(array $attributes = [])
 * @method static Link\MusicLink[]|Proxy[] all()
 * @method static Link\MusicLink[]|Proxy[] findBy(array $attributes)
 * @method static Link\MusicLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Link\MusicLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Link\MusicLink|Proxy create(array|callable $attributes = [])
 */
final class MusicLink extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => Link\MusicLink::LINK_TYPE,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Link\MusicLink::class;
    }
}
