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
        $classicLinksCollection = new ArrayCollection();
        $classicLinks = Factory\Classic::createMany(5);
        foreach ($classicLinks as $classicLink) {
            $classicLinksCollection->add($classicLink->object());
        }

        Factory\User::createOne(['id' => Factory\User::CLASSIC_USER_ID, 'links' => $classicLinksCollection]);

        // Show Link User
        $showLinksCollection = new ArrayCollection();
        $showLinks = Factory\ShowLink::createMany(5);
        foreach ($showLinks as $showLink) {
            $showLinksCollection->add($showLink->object());
        }

        $showListLink = Factory\ShowListLink::createOne(['showLinks' => $showLinksCollection]);

        Factory\User::createOne(['id' => Factory\User::SHOWS_USER_ID, 'links' => new ArrayCollection([$showListLink->object()])]);

        // Music Link User
        $musicLinksCollection = new ArrayCollection();
        $musicLinks = Factory\MusicLink::createMany(5);
        foreach ($musicLinks as $musicLink) {
            $musicLinksCollection->add($musicLink->object());
        }

        $musicListLink = Factory\MusicListLink::createOne(['musicLinks' => $musicLinksCollection]);

        Factory\User::createOne(['id' => Factory\User::MUSIC_USER_ID, 'links' => new ArrayCollection([$musicListLink->object()])]);

        // Mixed Link User
        $mixedLinkCollection = new ArrayCollection();
        $classicLink = Factory\Classic::createOne();

        $mixedShowLinksCollection = new ArrayCollection();
        $mixedShowLinks = Factory\ShowLink::createMany(5);
        foreach ($mixedShowLinks as $mixedShowLink) {
            $mixedShowLinksCollection->add($mixedShowLink->object());
        }

        $showListLink = Factory\ShowListLink::createOne(['showLinks' => $mixedShowLinksCollection]);

        $mixedMusicLinksCollection = new ArrayCollection();
        $mixedMusicLinks = Factory\ShowLink::createMany(5);
        foreach ($mixedMusicLinks as $mixedMusicLink) {
            $mixedMusicLinksCollection->add($mixedMusicLink->object());
        }
        $musicLink = Factory\MusicListLink::createOne(['musicLinks' => $mixedMusicLinksCollection]);

        $mixedLinkCollection->add($classicLink->object());
        $mixedLinkCollection->add($showListLink->object());
        $mixedLinkCollection->add($musicLink->object());

        Factory\User::createOne(['id' => Factory\User::MIXED_USER_ID, 'links' => $mixedLinkCollection]);
    }
}
