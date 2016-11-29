<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    const HTTP_STATUS_CODE_OK = 200;

    public function testIndex()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $response = $client->getResponse();

        $this->assertEquals(self::HTTP_STATUS_CODE_OK, $response->getStatusCode());
        $this->assertContains('Welcome to shakeit', $response->getContent());
    }
}
