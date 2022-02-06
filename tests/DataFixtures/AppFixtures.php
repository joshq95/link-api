<?php

declare(strict_types=1);

namespace App\Tests\DataFixtures;

use App\Tests\Factory\User;
use App\Tests\Factory\Classic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $links = new ArrayCollection([]);

        $classicLinks = Classic::createMany(5);
        foreach ($classicLinks as $classicLink) {
            $links->add($classicLink->object());
        }

        User::createOne(['links' => $links]);
    }
}
