<?php

namespace AppBundle\Tests;


use Prophecy\Argument;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldSendARequest()
    {
        $url = 'http://google.com';

        $httpClient = $this->prophesize(HttpClientInterface::class);
        $httpClient
            ->get(Argument::type('string'))
            ->willReturn('content')
            ->shouldBeCalled()
        ;

        $api = new Api($httpClient->reveal());
        $content = $api->request($url);

        $this->assertSame('content', $content);
    }
}
