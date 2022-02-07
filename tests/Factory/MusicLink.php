<?php

declare(strict_types=1);

namespace App\Tests\Factory;

use App\Document\Link\MusicListLink;
use DateTime;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<MusicListLink\MusicLink>
 *
 * @method static MusicListLink\MusicLink|Proxy createOne(array $attributes = [])
 * @method static MusicListLink\MusicLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static MusicListLink\MusicLink|Proxy find(object|array|mixed $criteria)
 * @method static MusicListLink\MusicLink|Proxy findOrCreate(array $attributes)
 * @method static MusicListLink\MusicLink|Proxy first(string $sortedField = 'id')
 * @method static MusicListLink\MusicLink|Proxy last(string $sortedField = 'id')
 * @method static MusicListLink\MusicLink|Proxy random(array $attributes = [])
 * @method static MusicListLink\MusicLink|Proxy randomOrCreate(array $attributes = [])
 * @method static MusicListLink\MusicLink[]|Proxy[] all()
 * @method static MusicListLink\MusicLink[]|Proxy[] findBy(array $attributes)
 * @method static MusicListLink\MusicLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static MusicListLink\MusicLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method MusicListLink\MusicLink|Proxy create(array|callable $attributes = [])
 */
final class MusicLink extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => MusicListLink\MusicLink::LINK_TYPE,
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
        return MusicListLink\MusicLink::class;
    }
}
