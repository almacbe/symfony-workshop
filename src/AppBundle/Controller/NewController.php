<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class NewController
{
    /**
     * @Route("/news")
     */
    public function show()
    {
        return new Response('List of news');
    }
}
