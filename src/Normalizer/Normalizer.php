<?php

declare(strict_types=1);

namespace App\Normalizer;

use App\Document;
use DateTimeInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class Normalizer
{
    /**
     * @var SerializerInterface
     */
    protected SerializerInterface $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param Document\User $user
     * @return array
     * @throws ExceptionInterface
     */
    public function normalizeUser(Document\User $user): array
    {
        $dateCallback = function ($innerObject) {
            return $innerObject instanceof \DateTime ? $innerObject->format(DateTimeInterface::ISO8601) : '';
        };

        return $this->serializer->normalize($user, null, [AbstractNormalizer::CALLBACKS => ['createdAt' => $dateCallback, 'updatedAt' => $dateCallback]]);
    }
}