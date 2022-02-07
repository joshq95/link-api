<?php

declare(strict_types=1);

namespace App\Tests\Factory;

use App\Document\Link;
use DateTime;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Link\MusicListLink>
 *
 * @method static Link\MusicListLink|Proxy createOne(array $attributes = [])
 * @method static Link\MusicListLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Link\MusicListLink|Proxy find(object|array|mixed $criteria)
 * @method static Link\MusicListLink|Proxy findOrCreate(array $attributes)
 * @method static Link\MusicListLink|Proxy first(string $sortedField = 'id')
 * @method static Link\MusicListLink|Proxy last(string $sortedField = 'id')
 * @method static Link\MusicListLink|Proxy random(array $attributes = [])
 * @method static Link\MusicListLink|Proxy randomOrCreate(array $attributes = [])
 * @method static Link\MusicListLink[]|Proxy[] all()
 * @method static Link\MusicListLink[]|Proxy[] findBy(array $attributes)
 * @method static Link\MusicListLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Link\MusicListLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Link\MusicListLink|Proxy create(array|callable $attributes = [])
 */
final class MusicListLink extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => Link\MusicListLink::LINK_TYPE,
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
        return Link\MusicListLink::class;
    }
}
