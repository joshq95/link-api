<?php

declare(strict_types=1);

namespace App\Controller;

use App\Document;
use App\Exception\InvalidRequestContentException;
use App\Exception\ResourceNotFoundException;
use App\Normalizer\Normalizer;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\LockException;
use Doctrine\ODM\MongoDB\Mapping\MappingException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\ExceptionInterface;

class Link
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
     * @param DocumentManager $documentManager
     * @param Normalizer $normalizer
     */
    public function __construct(DocumentManager $documentManager, Normalizer $normalizer)
    {
        $this->documentManager = $documentManager;
        $this->normalizer = $normalizer;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws LockException
     * @throws MappingException
     */
    #[Route('/api/users/{id}/links', name: 'put_user_links', methods: ['PUT'])]
    public function newLinkListByUserId(Request $request, int $id)
    {
        $userRepository = $this->documentManager->getRepository(Document\User::class);
        $user = $userRepository->find($id);
        if ($user === null) {
            throw new ResourceNotFoundException();
        }

        $content = $request->getContent();

        // @todo: Validate the message

        // @todo: Update the users links

        return new JsonResponse(['message' => sprintf('Successfully updated user %s', $id), 'test' => $content]);
    }
}