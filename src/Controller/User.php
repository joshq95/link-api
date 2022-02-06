<?php

declare(strict_types=1);

namespace App\Controller;

use App\Document;
use App\Exception\ResourceNotFoundException;
use App\Normalizer;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class User
{
    /**
     * @var DocumentManager
     */
    protected DocumentManager $documentManager;

    /**
     * @var Normalizer\User
     */
    protected Normalizer\User $normalizer;

    /**
     * @param DocumentManager $documentManager
     * @param Normalizer\User $normalizer
     */
    public function __construct(DocumentManager $documentManager, Normalizer\User $normalizer)
    {
        $this->documentManager = $documentManager;
        $this->normalizer = $normalizer;
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws LockException
     * @throws MappingException
     * @throws ResourceNotFoundException
     */
    #[Route('/api/users/{id}', name: 'get_user_links', methods: ['GET'])]
    public function getLinksByUserId(int $id)
    {
        $userRepository = $this->documentManager->getRepository(Document\User::class);
        $user = $userRepository->find($id);
        if ($user === null) {
            throw new ResourceNotFoundException();
        }

        return new JsonResponse(['user' => $this->normalizer->normalizeUser($user)]);
    }
}