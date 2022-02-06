<?php

declare(strict_types=1);

namespace App\Tests\DataFixtures;

use App\Tests\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Classic Link User
        $links = new ArrayCollection([]);

        $classicLinks = Factory\ShowListLink::createMany(5);
        foreach ($classicLinks as $classicLink) {
            $links->add($classicLink->object());
        }

        Factory\User::createOne(['id' => Factory\User::CLASSIC_USER_ID, 'links' => $links]);
        $links->clear();

        // Show Link User
        $showLinks = Factory\ShowLink::createMany(5);
        foreach ($showLinks as $showLink) {
            $links->add($showLink->object());
        }

        $showListLink = Factory\ShowListLink::createOne(['showLinks' => $links]);

        Factory\User::createOne(['id' => Factory\User::SHOWS_USER_ID, 'links' => new ArrayCollection([$showListLink->object()])]);
        $links->clear();

        // Music Link User
        $musicLinks = Factory\MusicLink::createMany(5);
        foreach ($musicLinks as $musicLink) {
            $links->add($musicLink->object());
        }

        Factory\User::createOne(['id' => Factory\User::MUSIC_USER_ID, 'links' => $links]);
        $links->clear();
    }
}
