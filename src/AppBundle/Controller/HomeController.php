<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    /**
     * @Route("/")
     */
    public function home()
    {
        return new Response('Welcome to shakeit');
    }
}
