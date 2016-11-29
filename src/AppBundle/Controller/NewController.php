<?php

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class NewController
{
    /**
     * @Route("/news/{page}", defaults={"page": 1}, requirements={"page": "\d+"})
     */
    public function index($page)
    {
        return new Response('List of news. Page: ' . $page);
    }
}
