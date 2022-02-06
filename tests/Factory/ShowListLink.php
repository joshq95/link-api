<?php

declare(strict_types=1);

namespace App\Tests\Factory;

use App\Document\Link;
use DateTime;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Link\ShowListLink>
 *
 * @method static Link\ShowListLink|Proxy createOne(array $attributes = [])
 * @method static Link\ShowListLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Link\ShowListLink|Proxy find(object|array|mixed $criteria)
 * @method static Link\ShowListLink|Proxy findOrCreate(array $attributes)
 * @method static Link\ShowListLink|Proxy first(string $sortedField = 'id')
 * @method static Link\ShowListLink|Proxy last(string $sortedField = 'id')
 * @method static Link\ShowListLink|Proxy random(array $attributes = [])
 * @method static Link\ShowListLink|Proxy randomOrCreate(array $attributes = [])
 * @method static Link\ShowListLink[]|Proxy[] all()
 * @method static Link\ShowListLink[]|Proxy[] findBy(array $attributes)
 * @method static Link\ShowListLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Link\ShowListLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Link\ShowListLink|Proxy create(array|callable $attributes = [])
 */
final class ShowListLink extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => Link\ShowListLink::LINK_TYPE,
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
        return Link\ShowListLink::class;
    }
}
