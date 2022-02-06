<?php

namespace App\Tests\Factory;

use App\Document\Link;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Link\Classic>
 *
 * @method static Link\Classic|Proxy createOne(array $attributes = [])
 * @method static Link\Classic[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Link\Classic|Proxy find(object|array|mixed $criteria)
 * @method static Link\Classic|Proxy findOrCreate(array $attributes)
 * @method static Link\Classic|Proxy first(string $sortedField = 'id')
 * @method static Link\Classic|Proxy last(string $sortedField = 'id')
 * @method static Link\Classic|Proxy random(array $attributes = [])
 * @method static Link\Classic|Proxy randomOrCreate(array $attributes = [])
 * @method static Link\Classic[]|Proxy[] all()
 * @method static Link\Classic[]|Proxy[] findBy(array $attributes)
 * @method static Link\Classic[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Link\Classic[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Link\Classic|Proxy create(array|callable $attributes = [])
 */
final class Classic extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => Link\Classic::LINK_TYPE,
            'createdAt' => self::faker()->dateTime(),
            'updatedAt' => self::faker()->dateTime(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Link\Classic::class;
    }
}
