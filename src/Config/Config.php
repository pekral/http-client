<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Config;

interface Config
{

    /**
     * Returns HTTP client configuration options.
     *
     * @return array<string, mixed> The HTTP client options
     */
    public function getHttpClientOptions(): array;

}
