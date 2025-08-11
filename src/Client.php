<?php

declare(strict_types = 1);

namespace Pekral\HttpClient;

use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Pekral\Flexibee\Exceptions\HttpInvalidRequest;
use Pekral\HttpClient\Config\Config as HttpConfig;
use Pekral\HttpClient\Exceptions\HttpInternal;
use Pekral\HttpClient\Exceptions\HttpNotFound;
use Pekral\HttpClient\Requests\Request;
use Pekral\HttpClient\Responses\Response;

final readonly class Client
{

    private HttpClient $httpClient;

    public function __construct(HttpConfig $config)
    {
        $this->httpClient = new HttpClient($config->getHttpClientOptions());
    }

    /**
     * @throws \Pekral\HttpClient\Exceptions\HttpInternal
     * @throws \Pekral\HttpClient\Exceptions\HttpNotFound
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Pekral\Flexibee\Exceptions\HttpInvalidRequest
     */
    public function makeRequest(Request $request): Response
    {
        try {
            return new Response($this->httpClient->request(
                $request->getMethod(),
                $request->getUri(),
                $request->getOptions(),
            ));
        } catch (ServerException $exception) {
            match ($exception->getCode()) {
                501 => throw new HttpInternal($exception->getResponse(), previous: $exception),
                default => throw $exception,
            };
        } catch (ClientException $exception) {
            match ($exception->getCode()) {
                404 => throw new HttpNotFound($exception->getResponse(), previous: $exception),
                400 => throw new HttpInvalidRequest($exception->getResponse(), previous: $exception),
                default => throw $exception,
            };
        }
    }

}
