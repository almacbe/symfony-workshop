<?php

namespace AppBundle\Tests;

class Api
{
    /**
     * @var HttpClientInterface
     */
    private $httpClient;

    /**
     * Api constructor.
     */
    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function request($url)
    {
        return $this->httpClient->get($url);
    }
}
