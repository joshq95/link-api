<?php

declare(strict_types=1);

namespace App\Tests\Factory;

use App\Document\Link;
use DateTime;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Link\ShowListLink\ShowLink>
 *
 * @method static Link\ShowListLink\ShowLink|Proxy createOne(array $attributes = [])
 * @method static Link\ShowListLink\ShowLink[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Link\ShowListLink\ShowLink|Proxy find(object|array|mixed $criteria)
 * @method static Link\ShowListLink\ShowLink|Proxy findOrCreate(array $attributes)
 * @method static Link\ShowListLink\ShowLink|Proxy first(string $sortedField = 'id')
 * @method static Link\ShowListLink\ShowLink|Proxy last(string $sortedField = 'id')
 * @method static Link\ShowListLink\ShowLink|Proxy random(array $attributes = [])
 * @method static Link\ShowListLink\ShowLink|Proxy randomOrCreate(array $attributes = [])
 * @method static Link\ShowListLink\ShowLink[]|Proxy[] all()
 * @method static Link\ShowListLink\ShowLink[]|Proxy[] findBy(array $attributes)
 * @method static Link\ShowListLink\ShowLink[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Link\ShowListLink\ShowLink[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method Link\ShowListLink\ShowLink|Proxy create(array|callable $attributes = [])
 */
final class ShowLink extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'title' => self::faker()->realText(20),
            'url' => self::faker()->url(),
            'linkType' => Link\ShowListLink\ShowLink::LINK_TYPE,
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
        return Link\ShowListLink\ShowLink::class;
    }
}
