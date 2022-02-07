<?php

declare(strict_types=1);

namespace App\Response\Exception;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResourceNotFoundException extends HttpException
{
    protected const MESSAGE = 'Resource could not be found';

    /**
     * @param string $message
     */
    public function __construct(string $message = self::MESSAGE)
    {
        parent::__construct(Response::HTTP_NOT_FOUND, $message);
    }
}
