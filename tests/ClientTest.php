<?php

declare(strict_types = 1);

namespace Pekral\HttpClient\Tests;

use Pekral\HttpClient\Client;
use Pekral\HttpClient\Config\HttpBasicConfig;
use Pekral\HttpClient\Requests\GenericRequest;
use PHPUnit\Framework\TestCase;

final class ClientTest extends TestCase
{

    public function testPingSeznamCz(): void
    {
        $request = new GenericRequest('/', 'GET');
        $client = new Client(new HttpBasicConfig('https://seznam.cz'));
        $this->assertTrue($client->makeRequest($request)->isOk());
    }

}
