<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Requests;

interface Request
{

    /**
     * Returns the URI path for the request.
     *
     * @return string The request URI path
     */
    public function getUri(): string;

    /**
     * Returns the HTTP method for the request.
     *
     * @return string The HTTP method (GET, POST, PUT, DELETE, etc.)
     */
    public function getMethod(): string;

    /**
     * Returns additional options for the HTTP request.
     *
     * @return array<string, mixed> The request options (query parameters, headers, body, etc.)
     */
    public function getOptions(): array;

    /**
     * Returns the data payload for the request.
     *
     * @return array<string, mixed> The request data
     */
    public function getData(): array;

}
