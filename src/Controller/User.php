<?php

declare(strict_types=1);

namespace App\Controller;

use App\Document;
use App\Normalizer\Normalizer;
use App\Request\Validator;
use App\Response\Exception\ResourceNotFoundException;
use App\Serializer\Serializer;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Doctrine\ODM\MongoDB\MongoDBException;
use Symfony\Component\HttpFoundation\Exception\JsonException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;

class User
{
    /**
     * @var DocumentManager
     */
    protected DocumentManager $documentManager;

    /**
     * @var Normalizer
     */
    protected Normalizer $normalizer;

    /**
     * @var Serializer
     */
    protected Serializer $serializer;

    /**
     * @var Validator
     */
    protected Validator $validator;

    /**
     * @param DocumentManager $documentManager
     * @param Normalizer $normalizer
     * @param Serializer $serializer
     * @param Validator $validator
     */
    public function __construct(
        DocumentManager $documentManager,
        Normalizer $normalizer,
        Serializer $serializer,
        Validator $validator
    ) {
        $this->documentManager = $documentManager;
        $this->normalizer = $normalizer;
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @param int $id
     * @return JsonResponse
     * @throws LockException
     * @throws MappingException
     * @throws ResourceNotFoundException|ExceptionInterface
     */
    #[Route('/api/users/{id}', name: 'get_user_links', methods: ['GET'])]
    public function getUserById(int $id): JsonResponse
    {
        $userRepository = $this->documentManager->getRepository(Document\User::class);
        $user = $userRepository->find($id);
        if ($user === null) {
            throw new ResourceNotFoundException();
        }

        return new JsonResponse(['user' => $this->normalizer->normalizeUser($user)]);
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws LockException
     * @throws MappingException
     * @throws MongoDBException
     */
    #[Route('/api/users/{id}', name: 'put_update_user', methods: ['PUT'])]
    public function updateUserLinksById(Request $request, int $id): JsonResponse
    {
        $userRepository = $this->documentManager->getRepository(Document\User::class);
        $user = $userRepository->find($id);
        if ($user === null) {
            throw new ResourceNotFoundException();
        }

        try {
            $updatedUser = $this->serializer->deserializeUpdatedUser($user, $request->getContent());
            $this->validator->validateUserContent($updatedUser);
            $this->documentManager->flush();
        } catch (NotNormalizableValueException $exception) {
            throw new JsonException($exception->getMessage());
        }

        return new JsonResponse(['message' => sprintf('Successfully updated user %s', $id)], Response::HTTP_ACCEPTED);
    }
}
