<?php

declare(strict_types=1);

namespace App\Request;

use App\Document\Link\AbstractLink;
use App\Document\Link\MusicListLink;
use App\Document\Link\ShowListLink;
use App\Document\User;
use App\Request\Exception\InvalidRequestException;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @todo: provide better error messages
 */
class Validator
{
    /**
     * @var ValidatorInterface
     */
    protected ValidatorInterface $validatorService;

    public function __construct(ValidatorInterface $validatorService)
    {
        $this->validatorService = $validatorService;
    }

    /**
     * @param User $user
     * @return void
     */
    public function validateUserContent(User $user): void
    {
        $errors = $this->validatorService->validate($user);

        if (count($errors) > 0) {
            throw InvalidRequestException::createFromInvalidData((string) $errors);
        }

        $links = $user->getLinks();
        foreach ($links as $link) {
            $this->validateLinkContent($link);
        }
    }

    /**
     * @param AbstractLink $link
     * @return void
     */
    public function validateLinkContent(AbstractLink $link): void
    {
        $errors = $this->validatorService->validate($link);

        // @todo: Add better validation for child links
        if (is_a($link, MusicListLink::class)) {
            $musicLinks = $link->getMusicLinks();

            foreach ($musicLinks as $musicLink) {
                $this->validateLinkContent($musicLink);
            }
        } elseif (is_a($link, ShowListLink::class)) {
            $showLinks = $link->getShowLinks();

            foreach ($showLinks as $showLink) {
                $this->validateLinkContent($showLink);
            }
        }

        if (count($errors) > 0) {
            throw InvalidRequestException::createFromInvalidData((string) $errors);
        }
    }
}
