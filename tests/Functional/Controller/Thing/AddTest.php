<?php

declare(strict_types=1);

namespace App\Tests\Functional\Controller\Thing;

use App\Tests\Functional\WebTestCase;

class AddTest extends WebTestCase
{
    public function test_returns_404_if_empty_name(): void
    {
        $this->client->request('POST', '/thing', ['name' => '']);
        self::assertResponseStatusCodeSame(400);
    }

    public function test_returns_201_happy_path(): void
    {
        $this->client->request('POST', '/thing', ['name' => 'Nowa rzecz']);
        self::assertResponseStatusCodeSame(201);
    }
}
