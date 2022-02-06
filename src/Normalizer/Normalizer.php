<?php

declare(strict_types=1);

namespace App\Normalizer;

use App\Document;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
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
        return $this->serializer->normalize($user);
    }
}