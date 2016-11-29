<?php

namespace AppBundle\Tests\Controller;

use AppBundle\Controller\NewController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    const HTTP_STATUS_CODE_OK = 200;
    const WELCOME_MESSAGE = 'Welcome to shakeit';
    const LIST_OF_NEWS_MESSAGE = 'List of news. Page: ';
    const DEFAULT_PAGE = '1';

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

        $response = $controller->index();

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
        $this->assertContains(self::LIST_OF_NEWS_MESSAGE.self::DEFAULT_PAGE, $response->getContent());
    }

    /**
     * @test
     */
    public function shouldGetAndErrorIfPageUrIsWrong()
    {
        $client = static::createClient();

        $client->request('GET', '/new/page');

        $response = $client->getResponse();

        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * @test
     */
    public function ShoulGetNewsOfPageTwo()
    {
        $PAGE_TWO = '2';
        $client = static::createClient();

        $client->request('GET', '/news/2');

        $response = $client->getResponse();

        $this->assertEquals(self::HTTP_STATUS_CODE_OK, $response->getStatusCode());
        $this->assertContains(self::LIST_OF_NEWS_MESSAGE.$PAGE_TWO, $response->getContent());
    }
}
