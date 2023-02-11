<?php

declare(strict_types=1);

namespace Functional\Controller\Thing;

use App\Tests\Functional\WebTestCase;

class ListTest extends WebTestCase
{
    public function test_returns_200_happy_path(): void
    {
        $thingName = 'Nowa rzecz';
        $this->client->request('POST', '/thing', ['name' => $thingName]);
        self::assertResponseStatusCodeSame(201);

        $this->client->request('GET', '/things');
        self::assertResponseStatusCodeSame(200);
        $response = $this->getJsonResponse();
        self::assertCount(1, $response);
        $item = reset($response);
        self::assertEquals($thingName, $item['name']);
    }
}
