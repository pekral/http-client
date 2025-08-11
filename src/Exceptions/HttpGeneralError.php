<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Exceptions;

use Exception;
use Psr\Http\Message\ResponseInterface;
use Throwable;

abstract class HttpGeneralError extends Exception
{

    public function __construct(private readonly ResponseInterface $response, ?Throwable $previous = null)
    {
        parent::__construct($this->response->getBody()->getContents(), $response->getStatusCode(), previous: $previous);
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

}
