<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Config;

use function count;
use function sprintf;

final readonly class HttpBasicConfig implements Config
{

    /**
     * @param array<string, mixed> $headers
     */
    public function __construct(private string $baseUrl, private ?string $username = null, private ?string $password = null, private int $port = 22, private array $headers = [])
    {
    }

    /**
     * Returns HTTP client configuration options for HTTP Basic authentication.
     *
     * @return array<string, mixed> The HTTP client options including authentication and base URI
     */
    public function getHttpClientOptions(): array
    {

        $baseOptions = [
            'base_uri' => sprintf('%s:%d', $this->baseUrl, $this->port),
        ];

        if ($this->username !== null && $this->password !== null) {
            $baseOptions['auth'] = [$this->username, $this->password];
        }

        if (count($this->headers) > 0) {
            $baseOptions['headers'] = $this->headers;
        }

        return $baseOptions;
    }

}
