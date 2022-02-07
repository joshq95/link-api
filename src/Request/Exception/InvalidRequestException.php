<?php

declare(strict_types=1);

namespace App\Request\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InvalidRequestException extends HttpException
{
    /**
     * @param string $errors
     * @return static
     */
    public static function createFromInvalidData(string $errors): self
    {
        return new self(
            Response::HTTP_BAD_REQUEST,
            $errors
        );
    }
}