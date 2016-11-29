<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\NewController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    const HTTP_STATUS_CODE_OK = 200;
    const WELCOME_MESSAGE = 'Welcome to shakeit';
    const LIST_OF_NEWS_MESSAGE = 'List of news';

    /**
     * @test
     */
    public function shouldSeeInHomePageAText()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $response = $client->getResponse();

        $this->assertEquals(self::HTTP_STATUS_CODE_OK, $response->getStatusCode());
        $this->assertContains(self::WELCOME_MESSAGE, $response->getContent());
    }

    /**
     * @test
     */
    public function shouldSeeInAPageATextUsingControllerAsService()
    {
        $controller = new NewController();

        $response = $controller->show();

        $this->assertEquals(self::HTTP_STATUS_CODE_OK, $response->getStatusCode());
        $this->assertContains(self::LIST_OF_NEWS_MESSAGE, $response->getContent());
    }

    /**
     * @test
     */
    public function shouldRequestForANewsPage()
    {
        $client = static::createClient();

        $client->request('GET', '/news');

        $response = $client->getResponse();

        $this->assertEquals(self::HTTP_STATUS_CODE_OK, $response->getStatusCode());
        $this->assertContains(self::LIST_OF_NEWS_MESSAGE, $response->getContent());
    }
}
