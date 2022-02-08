<?php

declare(strict_types=1);

namespace App\Serializer;

use App\Document;
use App\Document\Link\AbstractLink;
use App\Document\Link\Classic;
use App\Document\Link\MusicListLink;
use App\Document\Link\ShowListLink;
use App\Factory;
use App\Request\Exception\InvalidRequestException;
use App\Request\Validator;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class Serializer
{
    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * @var Validator
     */
    protected Validator $validator;

    /**
     * @param SerializerInterface $serializer
     * @param Validator $validator
     */
    public function __construct(SerializerInterface $serializer, Validator $validator)
    {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @param Document\User $user
     * @param string $requestContent
     * @return Document\User
     */
    public function deserializeUpdatedUser(Document\User $user, string $requestContent): Document\User
    {
        /** @var Document\User $deserializedUser */
        $deserializedUser = $this->serializer->deserialize(
            $requestContent,
            Document\User::class,
            'json',
            [
                AbstractNormalizer::OBJECT_TO_POPULATE => $user,
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['links']
            ]
        );

        $linkCollection = new ArrayCollection();
        $decodedLinks = $this->serializer->decode($requestContent, 'json')['links'];
        foreach ($decodedLinks as $decodedLink) {
            $link = $this->createLink($decodedLink);
            $this->validator->validateLinkContent($link);
            $linkCollection->add($link);
        }
        $deserializedUser->setLinks($linkCollection);

        return $deserializedUser;
    }

    /**
     * @param mixed $decodedLink
     * @return AbstractLink
     */
    private function createLink(array $decodedLink): AbstractLink
    {
        return match ($decodedLink['linkType']) {
            Classic::LINK_TYPE => Factory\ClassicLink::createLink($decodedLink),
            ShowListLink::LINK_TYPE => Factory\ShowListLink::createLink($decodedLink),
            ShowListLink\ShowLink::LINK_TYPE => Factory\ShowLink::createLink($decodedLink),
            MusicListLink::LINK_TYPE => Factory\MusicListLink::createLink($decodedLink),
            MusicListLink\MusicLink::LINK_TYPE => Factory\MusicLink::createLink($decodedLink)
        };
    }
}
