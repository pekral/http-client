<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Responses;

use Psr\Http\Message\ResponseInterface;

readonly class Response
{

    /**
     * Creates a new response instance.
     *
     * @param \Psr\Http\Message\ResponseInterface $response The HTTP response
     */
    public function __construct(private ResponseInterface $response)
    {
    }

    /**
     * Checks if the HTTP response status code indicates success.
     *
     * @return bool True if status code is in 2xx range
     */
    public function isOk(): bool
    {
        return $this->response->getStatusCode() >= 200 && $this->response->getStatusCode() < 300;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }

}
