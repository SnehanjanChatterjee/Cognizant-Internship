<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/welcome", name="welcome")
     */
    public function index()
    {
        return $this->render('welcome/index.html.twig', ['controller_name' => 'WelcomeController',]);
        // return new Response(content: 'hello', status: Response::HTTP_OK);
        // return new Response('<html><body>Hello!</body></html>', Response::HTTP_OK);
    }
}