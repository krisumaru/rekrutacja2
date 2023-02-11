<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller\Thing;

use App\Tests\Functional\WebTestCase;

class DeleteTest extends WebTestCase
{
    public function test_returns_200_when_not_existing(): void
    {
        $this->client->request('DELETE', '/thing/aaaa',);
        self::assertResponseStatusCodeSame(202);
    }

    public function test_returns_202_happy_path(): void
    {
        $this->client->request('POST', '/thing', ['name' => 'aaa']);
        self::assertResponseStatusCodeSame(201);

        $this->client->request('GET', '/things');
        self::assertResponseStatusCodeSame(200);
        $response = $this->getJsonResponse();
        $item = reset($response);
        $id = $item['id'];

        $this->client->request('DELETE', '/thing/'.$id);
        self::assertResponseStatusCodeSame(202);
    }
}
