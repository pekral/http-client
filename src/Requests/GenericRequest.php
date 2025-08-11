<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Requests;

class GenericRequest implements Request
{

    /**
     * @param array<string, mixed> $options
     * @param array<string, mixed> $data
     */
    public function __construct(
        private readonly string $uri,
        private readonly string $method,
        private readonly array $options = [],
        private readonly array $data = [],
        private readonly int $timeout = 30,
    ) {
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array
    {
        return ['connection_timeout' => $this->getTimeout(), ...$this->options];
    }

    /**
     * @return array<string, mixed>
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function getTimeout(): int
    {
        return $this->timeout;
    }

}
