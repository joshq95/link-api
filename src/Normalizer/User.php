<?php

declare(strict_types=1);

namespace App\Normalizer;

use App\Document;
use Symfony\Component\Serializer\SerializerInterface;

class User
{
    protected SerializerInterface $serializer;

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function normalizeUser(Document\User $user): array
    {
        return $this->serializer->normalize($user);
    }

}