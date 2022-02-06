<?php

namespace App\Tests\Factory;

use App\Document;
use App\Repository;
use Doctrine\Common\Collections\ArrayCollection;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Document\User>
 *
 * @method static Document\User|Proxy createOne(array $attributes = [])
 * @method static Document\User[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Document\User|Proxy find(object|array|mixed $criteria)
 * @method static Document\User|Proxy findOrCreate(array $attributes)
 * @method static Document\User|Proxy first(string $sortedField = 'id')
 * @method static Document\User|Proxy last(string $sortedField = 'id')
 * @method static Document\User|Proxy random(array $attributes = [])
 * @method static Document\User|Proxy randomOrCreate(array $attributes = [])
 * @method static Document\User[]|Proxy[] all()
 * @method static Document\User[]|Proxy[] findBy(array $attributes)
 * @method static Document\User[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Document\User[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static Repository\User|RepositoryProxy repository()
 * @method Document\User|Proxy create(array|callable $attributes = [])
 */
final class User extends ModelFactory
{
    protected function getDefaults(): array
    {
        return [
            'username' => '@' . self::faker()->firstName(),
            'imageUrl' => self::faker()->imageUrl(),
        ];
    }

    protected function initialize(): self
    {
        return $this;
    }

    protected static function getClass(): string
    {
        return Document\User::class;
    }
}
